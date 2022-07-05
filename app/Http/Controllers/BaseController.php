<?php

namespace App\Http\Controllers;

use App\Http\Resources\PaginatedCollection;
use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Routing\Controller as BaseRouteController;
use Illuminate\Support\Collection;
use Inertia\Inertia;
use Inertia\Response;
use JsonSerializable;

abstract class BaseController extends BaseRouteController
{
    use AuthorizesRequests;
    use DispatchesJobs;
    use ValidatesRequests;

    /**
     * @param JsonResource|array|null $resource
     * @param array $additional
     * @return mixed
     */
    public function render(JsonResource|array|null $resource = null, array $additional = []): mixed
    {
        $request = request();
        if ($resource instanceof JsonResource) {
            $resource = $resource->resolve($request);
        }

        if (is_array($resource)) {
            if (!array_key_exists('data', $resource)) {
                $resource = ['data' => $resource];
            }
            if ($additional) {
                $resource = array_merge($resource, $additional);
            }
        }

        $response = collect([])->when(
            !empty($resource),
            fn(Collection $collection) => $collection->merge($resource)
        )->when(
            empty($resource) && $additional,
            fn(Collection $collection) => $collection->merge($additional)
        );

        if ($response->isNotEmpty()) {
            $response = $response->sortByDesc(function ($item) {
                return is_array($item);
            })->toArray();
        }

        if ($request->has('ajax')) {
            return $response;
        }

        return response($response);
    }

    /**
     * @param Request $request
     * @param Builder|Relation $data
     * @param JsonResource|string $resource
     * @param int $defaultItemPerPage
     * @param array $additional
     * @return array|JsonSerializable|Arrayable
     */
    public function renderCollectionResponse(
        Request             $request,
        Builder|Relation    $data,
        JsonResource|string $resource,
        int                 $defaultItemPerPage = 10,
        array               $additional = []
    ): array|JsonSerializable|Arrayable
    {
        return $request->has('all')
            ? $resource::collection($data->get())->additional($additional)->toArray($request)
            : (new PaginatedCollection(
                $data
                    ->paginate($request->get('per_page', $defaultItemPerPage))
                    ->withQueryString(),
                $resource
            ))->additional($additional)->toArray($request);
    }

    /**
     * @return Authenticatable|User|null
     */
    public function getUser(): Authenticatable|User|null
    {
        return auth()->user();
    }
}

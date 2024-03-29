<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Resources\News\NewsOneResource;
use App\Http\Resources\News\NewsResource;
use App\Models\news;
use Illuminate\Http\Request;

class NewsController  extends BaseController
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request): mixed
    {
        return $this->render(
            $this->renderCollectionResponse(
                $request,
                news::query(),
                NewsResource::class
            )
        );
    }

    /**
     * @param Request $request
     * @param news $news
     * @return mixed
     */
    public function show(Request $request, news $news): mixed
    {
        return $this->render(new NewsOneResource($news));
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function showHome(Request $request): mixed
    {
        return $this->render(
            NewsResource::collection(news::query()
                ->orderBy('date' , 'ASC')
                ->take(3)
                ->get()
            )
        );
    }
}

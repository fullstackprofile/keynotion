<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Resources\Vacancy\VacancyResource;
use App\Models\vacancy;
use Illuminate\Http\Request;

class VacancyController extends BaseController
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
                vacancy::query(),
                VacancyResource::class
            )
        );
    }

}

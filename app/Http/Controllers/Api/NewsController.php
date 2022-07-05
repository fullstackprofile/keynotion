<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Resources\News\NewsOneResource;
use App\Http\Resources\News\NewsResource;
use App\Models\News;
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
                News::query(),
                NewsResource::class
            )
        );
    }

    /**
     * @param Request $request
     * @param News $news
     * @return mixed
     */
    public function show(Request $request, News $news): mixed
    {
        return $this->render(new NewsOneResource($news));
    }

}

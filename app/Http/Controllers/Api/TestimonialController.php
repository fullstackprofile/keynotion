<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use App\Http\Resources\Testimonial\TestimonialResource;
use App\Models\testimonial;
use Illuminate\Http\Request;

class TestimonialController extends BaseController
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
                testimonial::query(),
                TestimonialResource::class
            )
        );
    }
}

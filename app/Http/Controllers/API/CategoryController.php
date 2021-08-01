<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;

class APICategoryController extends ApiController
{
    //

    public function index(){

        $categories = Category::all();

        return $this->setStatusCode(200)->setStatusMessage('success')->respond([
            'data' => CategoryResource::collection($categories)
        ]);
    }
}

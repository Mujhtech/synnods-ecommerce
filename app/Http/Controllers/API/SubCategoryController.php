<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use App\Http\Requests\SubCategoryRequest;
use App\Http\Resources\SubCategoryResource;
use App\Models\SubCategory;

class SubCategoryController extends ApiController
{
    //
    public function index(){

        $sub_categories = SubCategory::all();

        return $this->setStatusCode(200)->setStatusMessage('success')->respond([
            'data' => SubCategoryResource::collection($sub_categories)
        ]);
    }
}

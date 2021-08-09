<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;

class ProductController extends ApiController
{
    //
    public function index(){

        $products = Product::all();

        return $this->setStatusCode(200)->setStatusMessage('success')->respond([
            'data' => ProductResource::collection($products)
        ]);
    }
}

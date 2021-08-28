<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use App\Http\Resources\OrderResource;
use App\Models\Order;

class ProductController extends ApiController
{
    //
    public function index(){

        $order = Order::with(['user', 'product', 'payment', 'items'])->get();

        return $this->setStatusCode(200)->setStatusMessage('success')->respond([
            'data' => OrderResource::collection($order)
        ]);
    }

}

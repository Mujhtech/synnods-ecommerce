<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\ApiController;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Models\Shipment;
use App\Models\DeliveryAddress;
use App\Models\Transaction;
use App\Models\PaymentMethod;
use App\Models\Order;
use App\Models\OrderTracking;
use App\Models\OrderItem;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Resources\PaymentMethodResource;

class CheckoutController extends ApiController
{

    public function paymentMethod(){

        $payment_methods = PaymentMethod::where('status', 1)->get();

        return $this->setStatusCode(200)->setStatusMessage('success')->respond([
            'data' => PaymentMethodResource::collection($payment_methods)
        ]);

    }

    public function checkCoupon(Request $request){



    }

    public function getShippingQoute(Request $request){

        

    }
}
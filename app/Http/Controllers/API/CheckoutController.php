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
use App\Models\Discount;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Resources\PaymentMethodResource;
use App\Http\Resources\DiscountResource;
use App\Http\Resources\ShippingResource;

class CheckoutController extends ApiController
{

    public function paymentMethod(){

        $payment_methods = PaymentMethod::where('status', 1)->get();

        return $this->setStatusCode(200)->setStatusMessage('success')->respond([
            'data' => PaymentMethodResource::collection($payment_methods)
        ]);

    }

    public function checkCoupon(Request $request){

        if(Discount::where('code', $request->coupon)->exists()){

            $discount = Discount::where('code', $request->coupon)->get();

            if(!$discount->expired){

                return $this->setStatusCode(200)->setStatusMessage('success')->respond([
                    'data' => DiscountResource::make($discount)
                ]);

            } else {

                return $this->setStatusCode(500)->setStatusMessage('error')->respond([
                    'message' => 'Coupon code has expired'
                ]);

            }

        } else {

            return $this->setStatusCode(500)->setStatusMessage('error')->respond([
                'message' => 'Invalid coupon'
            ]);

        }



    }

    public function getShippingQoute(Request $request){

        if($request->delivery_id){

            $delivery = DeliveryAddress::find($request->delivery_id);

            $shipping = Shipment::where('state', $delivery->state)->where('city', $delivery->city)->get();

            if($shipping->count() > 0){

                return $this->setStatusCode(200)->setStatusMessage('success')->respond([
                    'data' => ShippingResource::make($shipping)
                ]);

            } else {

                return $this->setStatusCode(500)->setStatusMessage('error')->respond([
                    'message' => 'Sorry, we are yet to cover your area check back later'
                ]);

            }

        } else {

            $shipping = Shipment::where('state', $request->state)->where('city', $request->city)->get();

            if($shipping->count() > 0){

                return $this->setStatusCode(200)->setStatusMessage('success')->respond([
                    'data' => ShippingResource::make($shipping)
                ]);

            } else {

                return $this->setStatusCode(500)->setStatusMessage('error')->respond([
                    'message' => 'Sorry, we are yet to cover your area check back later'
                ]);

            }



        }

    }
}
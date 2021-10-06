<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\ApiController;
use App\Http\Resources\ActivityLogResource;
use App\Http\Resources\ContactResource;
use App\Http\Resources\DiscountResource;
use App\Http\Resources\ErrorLogResource;
use App\Http\Resources\RoleResource;
use App\Http\Resources\ShippingResource;
use App\Http\Resources\UserResource;
use App\Models\ActivityLog;
use App\Models\Contact;
use App\Models\Discount;
use App\Models\ErrorLog;
use App\Models\Role;
use App\Models\Shipment;
use App\Models\User;
use App\Services\SendMailService;
use Illuminate\Http\Request;

class AdminController extends ApiController
{
    //
    private $email;

    public function __construct(SendMailService $email)
    {

        $this->email = $email;

    }

    public function users()
    {

        $users = User::where('role_id', '!=', 4)->get();

        return $this->setStatusCode(200)->setStatusMessage('success')->respond([
            'data' => UserResource::collection($users),
        ]);
    }

    public function customers()
    {

        $users = User::where('role_id', 4)->get();

        return $this->setStatusCode(200)->setStatusMessage('success')->respond([
            'data' => UserResource::collection($users),
        ]);
    }

    public function user(User $user)
    {

        return $this->setStatusCode(200)->setStatusMessage('success')->respond([
            'data' => UserResource::make($user),
        ]);
    }

    public function updateUser(Request $request)
    {

        $user = User::findOrFail($request->user_id);

        if ($request->type == "password") {
            $user->password = $request->password;
        } else {
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            $user->phone = $request->phone;
        }

        $user->first_name = $request->first_name;

        if ($user->save()) {

            return $this->setStatusCode(200)->setStatusMessage('success')->respond([
                'data' => UserResource::make($user),
                'message' => 'Data saved successfully',
            ]);

        } else {
            return $this->setStatusCode(500)->setStatusMessage('error')->respond([
                'message' => 'Error in saving data',
            ]);
        }
    }

    public function errors()
    {

        $errors = ErrorLog::get();

        return $this->setStatusCode(200)->setStatusMessage('success')->respond([
            'data' => ErrorLogResource::collection($errors),
        ]);
    }

    public function activities()
    {

        $activities = ActivityLog::get();

        return $this->setStatusCode(200)->setStatusMessage('success')->respond([
            'data' => ActivityLogResource::collection($activities),
        ]);
    }

    public function roles()
    {

        $roles = Role::get();

        return $this->setStatusCode(200)->setStatusMessage('success')->respond([
            'data' => RoleResource::collection($roles),
        ]);
    }

    public function contacts()
    {

        $contact = Contact::get();

        return $this->setStatusCode(200)->setStatusMessage('success')->respond([
            'data' => ContactResource::collection($contact),
        ]);
    }

    public function getContact(Contact $contact)
    {

        return $this->setStatusCode(200)->setStatusMessage('success')->respond([
            'data' => ContactResource::make($contact),
        ]);
    }

    public function getShippings()
    {

        $shippings = Shipment::get();

        return $this->setStatusCode(200)->setStatusMessage('success')->respond([
            'data' => ShippingResource::collection($shippings),
        ]);
    }

    public function getShipping($id)
    {

        $shipping = Shipment::find($id);

        return $this->setStatusCode(200)->setStatusMessage('success')->respond([
            'data' => ShippingResource::make($shipping),
        ]);
    }

    public function createShipping(Request $request)
    {

        if (Shipment::where('type', $request->type)->exists() && Shipment::where('city', $request->city)->exists()) {

            return $this->setStatusCode(500)->setStatusMessage('error')->respond([
                'message' => 'Data already exists',
            ]);

        }

        $shipping = new Shipment;

        $shipping->country = $request->country;
        $shipping->state = $request->state;
        $shipping->city = $request->city;
        $shipping->type = $request->type;
        $shipping->price = $request->amount;
        $shipping->status = $request->publish == "true" ? 1 : 0;

        if ($shipping->save()) {

            return $this->setStatusCode(200)->setStatusMessage('success')->respond([
                'shipping' => ShippingResource::make($shipping),
                'message' => 'Data save successfully',
            ]);

        } else {

            return $this->setStatusCode(500)->setStatusMessage('error')->respond([
                'message' => 'Something went wrong',
            ]);

        }

    }

    public function updateShipping(Request $request)
    {

        $shipping = Shipment::findorFail($request->shipping_id);

        if (Shipment::where('type', $request->type)->exists() && Shipment::where('city', $request->city)->exists()) {

            return $this->setStatusCode(500)->setStatusMessage('error')->respond([
                'message' => 'Data already exists',
            ]);

        }

        $shipping->country = $request->country;
        $shipping->state = $request->state;
        $shipping->city = $request->city;
        $shipping->type = $request->type;
        $shipping->price = $request->amount;
        $shipping->status = $request->publish == "true" ? 1 : 0;

        if ($shipping->save()) {

            return $this->setStatusCode(200)->setStatusMessage('success')->respond([
                'shipping' => ShippingResource::make($shipping),
                'message' => 'Data save successfully',
            ]);

        } else {

            return $this->setStatusCode(500)->setStatusMessage('error')->respond([
                'message' => 'Something went wrong',
            ]);

        }

    }

    public function getCoupons()
    {

        $discounts = Discount::get();

        return $this->setStatusCode(200)->setStatusMessage('success')->respond([
            'data' => DiscountResource::collection($discounts),
        ]);
    }

    public function getCoupon($id)
    {

        $discount = Discount::find($id);

        return $this->setStatusCode(200)->setStatusMessage('success')->respond([
            'data' => DiscountResource::make($discount),
        ]);
    }

    public function createDiscount(Request $request)
    {

        if (Discount::where('code', $request->code)->exists()) {

            return $this->setStatusCode(500)->setStatusMessage('error')->respond([
                'message' => 'Data already exists',
            ]);

        }

        $discount = new Discount;

        $discount->country = $request->country;
        $discount->state = $request->state;
        $discount->city = $request->city;
        $discount->type = $request->type;
        $discount->price = $request->amount;
        $discount->status = $request->publish == "true" ? 1 : 0;

        if ($discount->save()) {

            return $this->setStatusCode(200)->setStatusMessage('success')->respond([
                'discount' => DiscountResource::make($discount),
                'message' => 'Data save successfully',
            ]);

        } else {

            return $this->setStatusCode(500)->setStatusMessage('error')->respond([
                'message' => 'Something went wrong',
            ]);

        }

    }

    public function updateDiscount(Request $request)
    {

        $discount = Discount::findorFail($request->discount_id);

        if (Discount::where('code', $request->code)->exists()) {

            return $this->setStatusCode(500)->setStatusMessage('error')->respond([
                'message' => 'Data already exists',
            ]);

        }

        $discount->country = $request->country;
        $discount->state = $request->state;
        $discount->city = $request->city;
        $discount->type = $request->type;
        $discount->price = $request->amount;
        $discount->status = $request->publish == "true" ? 1 : 0;

        if ($discount->save()) {

            return $this->setStatusCode(200)->setStatusMessage('success')->respond([
                'discount' => DiscountResource::make($discount),
                'message' => 'Data save successfully',
            ]);

        } else {

            return $this->setStatusCode(500)->setStatusMessage('error')->respond([
                'message' => 'Something went wrong',
            ]);

        }

    }

}

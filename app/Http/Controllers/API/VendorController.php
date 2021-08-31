<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use App\Models\Vendor;
use App\Http\Resources\VendorResource;

class VendorController extends ApiController
{
    //

    public function index(){

        $vendors = Vendor::get();

        return $this->setStatusCode(200)->setStatusMessage('success')->respond([
            'vendors' => VendorResource::collection($vendors)
        ]);

    }


    public function single($slug){

        $vendor = Vendor::where('id', $slug)->first();

        return $this->setStatusCode(200)->setStatusMessage('success')->respond([
            'vendor' => VendorResource::make($vendor)
        ]);

    }


    public function mystore($id){

        $vendor = Vendor::find($id);

        return $this->setStatusCode(200)->setStatusMessage('success')->respond([
            'vendor' => VendorResource::make($vendor)
        ]);

    }

    public function store(Request $request){

        //$request->validated();

        $vendor = $request->isMethod('put') ? Vendor::findorFail($request->category_id) : new Vendor;
        $vendor->store_logo = $request->file('image')->store('public/vendors');
        $vendor->store_description = $request->description;
        $vendor->user_id = $request->user_id;
        $vendor->store_name = $request->name;
        $vendor->store_email = $request->email;
        $vendor->store_phone = $request->phone;
        $vendor->store_country = $request->country;
        $vendor->store_state = $request->state;
        $vendor->store_city = $request->city;
        $vendor->store_address = $request->address;
        $vendor->store_url = $request->url;
        $vendor->store_slug = strtolower(str_replace(' ', '-', $request->name));
        $vendor->status = 1;

        if($vendor->save()){

            return $this->setStatusCode(200)->setStatusMessage('success')->respond([
                'vendor' => VendorResource::make($vendor),
                'message' => 'Data save successfully'
            ]);

        } else {

            return $this->setStatusCode(500)->setStatusMessage('error')->respond([
                'message' => 'Something went wrong'
            ]);

        }


    }


    public function update(Request $request){

        //$request->validated();

        $vendor = Vendor::findorFail($request->vendor_id);


        if($request->hasFile('image')){
            
            $vendor->store_logo = $request->file('image')->store('vendors');

        }

        $vendor->store_description = $request->description;
        $vendor->store_name = $request->name;
        $vendor->store_email = $request->email;
        $vendor->store_phone = $request->phone;
        $vendor->store_country = $request->country;
        $vendor->store_state = $request->state;
        $vendor->store_city = $request->city;
        $vendor->store_address = $request->address;
        $vendor->store_url = $request->url;
        $vendor->store_slug = strtolower(str_replace(' ', '-', $request->name));
        $vendor->status = 1;

        if($vendor->save()){

            return $this->setStatusCode(200)->setStatusMessage('success')->respond([
                'vendor' => VendorResource::make($vendor),
                'message' => 'Data save successfully'
            ]);

        } else {

            return $this->setStatusCode(500)->setStatusMessage('error')->respond([
                'message' => 'Something went wrong'
            ]);

        }


    }

    public function destroy($slug){

        $vednor = Vendor::where('slug', $slug)->first();

        Storage::delete($vendor->store_logo);

        if($vendor->delete()){

            return $this->setStatusCode(200)->setStatusMessage('success')->respond([
                'message' => 'Data remove successfully'
            ]);

        } else {

            return $this->setStatusCode(500)->setStatusMessage('error')->respond([
                'message' => 'Something went wrong'
            ]);

        }

    }
}

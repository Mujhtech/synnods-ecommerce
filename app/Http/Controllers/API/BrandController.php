<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use App\Http\Resources\ProductBrandResource;
use App\Models\ProductBrand;

class BrandController extends ApiController
{
    //
    public function index(){

        $brands = ProductBrand::get();

        return $this->setStatusCode(200)->setStatusMessage('success')->respond([
            'data' => ProductBrandResource::collection($brands)
        ]);
    }

    public function single($slug){

        $brand = ProductBrand::where('slug', $slug)->first();

        return $this->setStatusCode(200)->setStatusMessage('success')->respond([
            'data' => ProductBrandResource::make($brand)
        ]);

    }

    public function store(Request $request){

        if(ProductBrand::where('name', $request->name)->exists()){
            
            return $this->setStatusCode(500)->setStatusMessage('error')->respond([
                'message' => 'Data already exists'
            ]);

        }

        $brand = new ProductBrand;

        if($request->hasFile('image')){

            $brand->image = $request->file('image')->store('brands');
        }

        $brand->name = $request->name;
        $brand->slug = strtolower(str_replace(' ', '-', $request->name));
        $brand->status = $request->publish == "true" ? 1 : 0;

        if($brand->save()){

            return $this->setStatusCode(200)->setStatusMessage('success')->respond([
                'brand' => ProductBrandResource::make($brand),
                'message' => 'Data save successfully'
            ]);

        } else {

            return $this->setStatusCode(500)->setStatusMessage('error')->respond([
                'message' => 'Something went wrong'
            ]);

        }


    }


    public function update(Request $request){

        $brand = ProductBrand::findorFail($request->brand_id);

        if(ProductBrand::where('name', $request->name)->exists() && $brand->name != $request->name){
            
            return $this->setStatusCode(500)->setStatusMessage('error')->respond([
                'message' => 'Data already exists'
            ]);

        }
        
        
        if($request->hasFile('image')){

            if(Storage::exists($brand->image)){

                Storage::delete($brand->image);
    
            }

            $brand->image = $request->file('image')->store('brands');
        }

        $brand->name = $request->name;
        $brand->slug = strtolower(str_replace(' ', '-', $request->name));
        $brand->status = $request->publish == "true" ? 1 : 0;

        if($brand->save()){

            return $this->setStatusCode(200)->setStatusMessage('success')->respond([
                'brand' => ProductBrandResource::make($brand),
                'message' => 'Data save successfully'
            ]);

        } else {

            return $this->setStatusCode(500)->setStatusMessage('error')->respond([
                'message' => 'Something went wrong'
            ]);

        }


    }

    public function destroy($slug){

        $brand = ProductBrand::where('slug', $slug)->first();

        if(Storage::exists($brand->image)){

            Storage::delete($brand->image);

        }

        if($brand->delete()){

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

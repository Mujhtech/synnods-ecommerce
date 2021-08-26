<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use App\Http\Requests\SubCategoryRequest;
use App\Http\Resources\SubCategoryResource;
use App\Models\SubCategory;
use App\Models\Category;

class SubCategoryController extends ApiController
{
    //
    public function index($slug){

        $category = Category::where('slug', $slug)->first();

        $sub_categories = SubCategory::where('category_id', $category->id)->where('status', 1)->get();

        return $this->setStatusCode(200)->setStatusMessage('success')->respond([
            'data' => SubCategoryResource::collection($sub_categories)
        ]);
    }

    public function single($slug){

        $sub_category = SubCategory::where('slug', $slug)->first();

        return $this->setStatusCode(200)->setStatusMessage('success')->respond([
            'data' => SubCategoryResource::make($sub_category)
        ]);

    }

    public function store(SubCategoryRequest $request){

        $request->validated();

        if(SubCategory::where('name', $request->name)->exists()){
            
            return $this->setStatusCode(500)->setStatusMessage('error')->respond([
                'message' => 'Data already exists'
            ]);

        }

        $sub_category = new SubCategory;

        if($request->hasFile('image')){

            $sub_category->image = $request->file('image')->store('sub_categories');
        }

        $sub_category->description = $request->description;
        $sub_category->category_id = $request->category_id;
        $sub_category->name = $request->name;
        $sub_category->slug = strtolower(str_replace(' ', '-', $request->name));
        $sub_category->status = $request->publish == "true" ? 1 : 0;

        if($sub_category->save()){

            return $this->setStatusCode(200)->setStatusMessage('success')->respond([
                'sub_category' => SubCategoryResource::make($sub_category),
                'message' => 'Data save successfully'
            ]);

        } else {

            return $this->setStatusCode(500)->setStatusMessage('error')->respond([
                'message' => 'Something went wrong'
            ]);

        }


    }


    public function update(SubCategoryRequest $request){

        $request->validated();

        $sub_category = SubCategory::findorFail($request->sub_category_id);


        if(SubCategory::where('name', $request->name)->exists() && $sub_category->name != $request->name){
            
            return $this->setStatusCode(500)->setStatusMessage('error')->respond([
                'message' => 'Data already exists'
            ]);

        }
        
        
        if($request->hasFile('image')){

            if(Storage::exists($sub_category->image)){

                Storage::delete($sub_category->image);
    
            }

            $sub_category->image = $request->file('image')->store('sub_categories');
        }

        $sub_category->description = $request->description;
        //$sub_category->category_id = $request->category_id;
        $sub_category->name = $request->name;
        $sub_category->slug = strtolower(str_replace(' ', '-', $request->name));
        $sub_category->status = $request->publish == "true" ? 1 : 0;

        if($sub_category->save()){

            return $this->setStatusCode(200)->setStatusMessage('success')->respond([
                'sub_category' => SubCategoryResource::make($sub_category),
                'message' => 'Data save successfully'
            ]);

        } else {

            return $this->setStatusCode(500)->setStatusMessage('error')->respond([
                'message' => 'Something went wrong'
            ]);

        }


    }

    public function destroy($slug){

        $sub_category = SubCategory::where('slug', $slug)->first();

        if(Storage::exists($sub_category->image)){

            Storage::delete($sub_category->image);

        }

        if($sub_category->delete()){

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

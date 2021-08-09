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

        $sub_categories = SubCategory::where('status', 1)->get();

        return $this->setStatusCode(200)->setStatusMessage('success')->respond([
            'data' => SubCategoryResource::collection($sub_categories)
        ]);
    }

    public function single($slug){

        $sub_category = SubCategory::where('id', $slug)->first();

        return $this->setStatusCode(200)->setStatusMessage('success')->respond([
            'data' => SubCategoryResource::make($sub_category)
        ]);

    }

    public function store(SubCategoryRequest $request){

        $request->validated();

        $sub_category = $request->isMethod('put') ? SubCategory::findorFail($request->category_id) : new SubCategory;
        $sub_category->image = $request->file('image')->store('sub_categories');
        $sub_category->description = $request->description;
        $sub_category->category_id = $request->category_id;
        $sub_category->name = $request->name;
        $sub_category->slug = strtolower(str_replace(' ', '-', $request->name));
        $sub_category->status = 1;

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

        Storage::delete($sub_category->image);

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

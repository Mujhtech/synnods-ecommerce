<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Storage;

class CategoryController extends ApiController
{
    //

    public function index(){

        $categories = Category::where('status', 1)->with('sub_categories')->get();

        return $this->setStatusCode(200)->setStatusMessage('success')->respond([
            'data' => CategoryResource::collection($categories)
        ]);
    }

    public function single($slug){

        $category = Category::where('id', $slug)->first();

        return $this->setStatusCode(200)->setStatusMessage('success')->respond([
            'data' => CategoryResource::make($category)
        ]);

    }

    public function store(CategoryRequest $request){

        $request->validated();

        $category = $request->isMethod('put') ? Category::findorFail($request->category_id) : new Category;
        $category->image = $request->file('image')->store('categories');
        $category->description = $request->description;
        $category->name = $request->name;
        $category->slug = strtolower(str_replace(' ', '-', $request->name));
        $category->status = 1;

        if($category->save()){

            return $this->setStatusCode(200)->setStatusMessage('success')->respond([
                'category' => CategoryResource::make($category),
                'message' => 'Data save successfully'
            ]);

        } else {

            return $this->setStatusCode(500)->setStatusMessage('error')->respond([
                'message' => 'Something went wrong'
            ]);

        }


    }

    public function destroy($slug){

        $category = Category::where('slug', $slug)->first();

        Storage::delete($category->image);

        if($category->delete()){

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

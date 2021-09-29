<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\ApiController;
use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\TopLevelCategoryResource;
use App\Models\Category;
use App\Models\TopLevelCategory;
use Storage;

class CategoryController extends ApiController
{
    //

    public function index()
    {

        $categories = Category::where('status', 1)->with('sub_categories')->get();

        return $this->setStatusCode(200)->setStatusMessage('success')->respond([
            'data' => CategoryResource::collection($categories),
        ]);
    }

    public function topLevel()
    {

        $top_level = TopLevelCategory::where('status', 1)->with('categories')->get();

        return $this->setStatusCode(200)->setStatusMessage('success')->respond([
            'data' => TopLevelCategoryResource::collection($top_level),
        ]);
    }

    public function single($slug)
    {

        $category = Category::where('slug', $slug)->first();

        return $this->setStatusCode(200)->setStatusMessage('success')->respond([
            'data' => CategoryResource::make($category),
        ]);

    }

    public function store(CategoryRequest $request)
    {

        $request->validated();

        if (Category::where('name', $request->name)->exists()) {

            return $this->setStatusCode(500)->setStatusMessage('error')->respond([
                'message' => 'Data already exists',
            ]);

        }

        $category = new Category;

        if ($request->hasFile('image')) {

            $category->image = $request->file('image')->store('categories');
        }

        $category->description = $request->description;
        $category->name = $request->name;
        $category->icon = $request->icon;
        $category->top_level_category_id = $request->top_level_category_id;
        $category->slug = strtolower(str_replace(' ', '-', $request->name));
        $category->status = $request->publish == "true" ? 1 : 0;

        if ($category->save()) {

            return $this->setStatusCode(200)->setStatusMessage('success')->respond([
                'category' => CategoryResource::make($category),
                'message' => 'Data save successfully',
            ]);

        } else {

            return $this->setStatusCode(500)->setStatusMessage('error')->respond([
                'message' => 'Something went wrong',
            ]);

        }

    }

    public function update(CategoryRequest $request)
    {

        $request->validated();

        $category = Category::findorFail($request->category_id);

        if (Category::where('name', $request->name)->exists() && $category->name != $request->name) {

            return $this->setStatusCode(500)->setStatusMessage('error')->respond([
                'message' => 'Data already exists',
            ]);

        }

        if ($request->hasFile('image')) {

            if (Storage::exists($category->image)) {

                Storage::delete($category->image);

            }

            $category->image = $request->file('image')->store('categories');
        }

        $category->description = $request->description;
        $category->name = $request->name;
        $category->icon = $request->icon;
        $category->top_level_category_id = $request->top_level_category_id;
        $category->slug = strtolower(str_replace(' ', '-', $request->name));
        $category->status = $request->publish == "true" ? 1 : 0;

        if ($category->save()) {

            return $this->setStatusCode(200)->setStatusMessage('success')->respond([
                'category' => CategoryResource::make($category),
                'message' => 'Data save successfully',
            ]);

        } else {

            return $this->setStatusCode(500)->setStatusMessage('error')->respond([
                'message' => 'Something went wrong',
            ]);

        }

    }

    public function destroy($slug)
    {

        $category = Category::where('slug', $slug)->first();

        if (Storage::exists($category->image)) {

            Storage::delete($category->image);

        }

        if ($category->delete()) {

            return $this->setStatusCode(200)->setStatusMessage('success')->respond([
                'message' => 'Data remove successfully',
            ]);

        } else {

            return $this->setStatusCode(500)->setStatusMessage('error')->respond([
                'message' => 'Something went wrong',
            ]);

        }

    }
}

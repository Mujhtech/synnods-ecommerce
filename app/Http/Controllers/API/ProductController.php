<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Models\ProductBrand;
use App\Models\ProductLabel;
use App\Models\ProductReview;
use App\Models\ProductTag;
use App\Models\Category;
use App\Models\Vendor;
use App\Models\SubCategory;

class ProductController extends ApiController
{
    //
    public function index(){

        $products = Product::with(['vendor', 'reviews', 'category', 'sub_category', 'brand'])->get();

        return $this->setStatusCode(200)->setStatusMessage('success')->respond([
            'data' => ProductResource::collection($products)
        ]);
    }


    public function byCategory($slug){

        $category = Category::where('slug', $slug)->first();

        $products = Product::where('category_id', $category->id)->with(['vendor', 'reviews', 'category', 'sub_category', 'brand'])->get();

        return $this->setStatusCode(200)->setStatusMessage('success')->respond([
            'data' => ProductResource::collection($products)
        ]);
    }

    public function bySubCategory($slug){

        $sub_category = SubCategory::where('slug', $slug)->first();

        $products = Product::where('category_id', $sub_category->id)->with(['vendor', 'reviews', 'category', 'sub_category', 'brand'])->get();

        return $this->setStatusCode(200)->setStatusMessage('success')->respond([
            'data' => ProductResource::collection($products)
        ]);
    }


    public function byVendor($slug){

        $vendor = Vendor::where('store_slug', $slug)->first();

        $products = Product::where('category_id', $vendor->user_id)->with(['vendor', 'reviews', 'category', 'sub_category', 'brand'])->get();

        return $this->setStatusCode(200)->setStatusMessage('success')->respond([
            'data' => ProductResource::collection($products)
        ]);
    }

    public function store(ProductRequest $request){

        $request->validated();

        $brand = ProductBrand::where('name', $request->product_brand)->exists() ? ProductBrand::where('name', $request->product_brand)->first() : new ProductBrand;
        $brand->name = $request->product_brand;
        $brand->save();

        $product = $request->isMethod('put') ? Product::findorFail($request->product_id) : new Product;
        $product->featured_image = $request->file('featured_image')->store('products');
        $product->description = $request->description;
        $product->name = $request->name;
        $product->contents = $request->contents;
        $product->category_id = $request->category_id;
        $product->sub_category_id = $request->sub_category_id;
        $product->vendor_id = $request->vendor_id;
        $product->sku = $request->sku;
        $product->product_brand_id = $brand->id;
        $product->slug = strtolower(str_replace(' ', '-', $request->name));
        $product->status = 1;
        $product->price = $request->price;
        $product->weight = $request->weight;

        if($product->save()){

            return $this->setStatusCode(200)->setStatusMessage('success')->respond([
                'product' => ProductResource::make($product),
                'message' => 'Data save successfully'
            ]);

        } else {

            return $this->setStatusCode(500)->setStatusMessage('error')->respond([
                'message' => 'Something went wrong'
            ]);

        }

    }
}

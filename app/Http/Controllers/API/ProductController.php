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
use App\Http\Resources\VendorResource;
use App\Http\Resources\SubCategoryResource;
use App\Http\Resources\CategoryResource;

class ProductController extends ApiController
{
    //
    public function index(){

        $products = Product::with(['vendor', 'reviews', 'category', 'sub_category', 'brand'])->get();

        return $this->setStatusCode(200)->setStatusMessage('success')->respond([
            'data' => ProductResource::collection($products)
        ]);
    }


    public function shop(Request $request){

        $query = [];

        $products = Product::with(['vendor', 'reviews', 'category', 'sub_category', 'brand']);

        if(!empty($request->category)){

            if(!Category::where('slug', $request->sub_category)->exists()){

                return $this->setStatusCode(500)->setStatusMessage('error')->respond([
                    'message' => 'Cannot find product'
                ]);

            }

            $category = Category::where('slug', $request->category)->first();

            $query['category_id'] = $category->id;

        }

        if(!empty($request->sub_category)){

            if(!SubCategory::where('slug', $request->sub_category)->exists()){

                return $this->setStatusCode(500)->setStatusMessage('error')->respond([
                    'message' => 'Cannot find product'
                ]);

            }

            $sub_category = SubCategory::where('slug', $request->sub_category)->first();

            $query['sub_category_id'] = $sub_category->id;

        }

        if(!empty($request->brand)){

            if(!ProductBrand::where('name', $request->brand)->exists()){

                return $this->setStatusCode(500)->setStatusMessage('error')->respond([
                    'message' => 'Cannot find product brand'
                ]);

            }

            $brand = ProductBrand::where('name', $request->brand)->first();

            $query['product_brand_id'] = $brand->id;

        }


        if(!empty($request->tags)){

            //$sub_category = SubCategory::where('slug', $request->sub_category)->first();

            //$query['sub_category_id'] = $sub_category->id;

        }

        if(!empty($request->search)){
            $products->where(function ($query) use ($filter) {
                $query->where('name', 'LIKE', $request->search . '%');
            });
        }

        if(!empty($request->max_price) || !empty($request->min_price)){

            $max = $request->max_price;
            $min = $request->min_price;

            $products->where(function ($query) use ($max) {
                $query->where('price', '<', $max);
            });

            $products->where(function ($query) use ($min) {
                $query->where('price', '>', $min);
            });
        }

        if(!empty($request->order_by)){
            if($request->order_by == "featured"){
                $products->orderBy('created_at', 'DESC');
            } elseif($request->order_by == "new"){
                $products->orderBy('created_at', 'DESC');
            } elseif($request->order_by == "price-asc"){
                $products->orderBy('price', 'ASC');
            } elseif($request->order_by == "price-dec"){
                $products->orderBy('price', 'DESC');
            } elseif($request->order_by == "rating"){
                $products->orderBy('ratings', 'DESC');
            } else {
                $products->orderBy('created_at', 'DESC');
            }
        }

        $products = $products->where($query)->paginate($request->per_page);

        return $this->setStatusCode(200)->setStatusMessage('success')->respond([
            'data' => ProductResource::collection($products)
        ]);
    }


    public function byCategory($slug){

        $category = Category::where('slug', $slug)->first();

        $products = Product::where('category_id', $category->id)->with(['vendor', 'reviews', 'category', 'sub_category', 'brand'])->get();

        return $this->setStatusCode(200)->setStatusMessage('success')->respond([
            'category' => CategoryResource::make($category),
            'product' => ProductResource::collection($products)
        ]);
    }

    public function bySubCategory($slug){

        $sub_category = SubCategory::where('slug', $slug)->first();

        $products = Product::where('category_id', $sub_category->id)->with(['vendor', 'reviews', 'category', 'sub_category', 'brand'])->get();

        return $this->setStatusCode(200)->setStatusMessage('success')->respond([
            'sub_category' => SubCategoryResource::make($sub_category),
            'product' => ProductResource::collection($products)
        ]);
    }


    public function single($slug){

        $products = Product::where('slug', $slug)->with(['vendor', 'reviews', 'category', 'sub_category', 'brand'])->first();

        return $this->setStatusCode(200)->setStatusMessage('success')->respond([
            'data' => ProductResource::make($products)
        ]);
    }


    public function byVendor($slug){

        $vendor = Vendor::where('store_slug', $slug)->first();

        $products = Product::where('category_id', $vendor->user_id)->with(['vendor', 'reviews', 'category', 'sub_category', 'brand'])->get();

        return $this->setStatusCode(200)->setStatusMessage('success')->respond([
            'vendor' => VendorResource::make($vendor),
            'product' => ProductResource::collection($products)
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function add_product(Request $request)
    {
        $product = new Product;
        $product->product_name = $request->productname;
        $product->product_price = $request->productprice;
        $product->product_description = $request->productdescription;
        $product->save();
        $lastinsertedId = $product->id;
        foreach ($request->product_image as $multiimages) {
            $productImage = 'product_image'.time().'.'.$multiimages->extension();
            $multiimages->move(public_path('images'), $productImage);
            $image = new ProductImage;
            $image->product_id = $lastinsertedId;
            $image->product_images = $productImage;
            $image->save();
        }
        return $product->id;
    }
    public function list(Request $request)
    {
        $product_list = DB::table('products')->get();
        // dd($product_list);
        return view("list")->with('product_list', $product_list);
    }
    public function edit(Request $request)
    {
        $product_list = DB::table('products')->where('id',$request->id)->first();
        // dd($product_list->id);
        $product_image = DB::table('products_image')->where('product_id',$product_list->id)->get();
        // dd($product_image);
        return view("edit")->with('product_list', $product_list)->with('product_image', $product_image);
    }
    public function update(Request $request)
    {
        $update_products = Product::where('id',$request->product_id)
                        ->update([
                            'product_name' => $request->product_name,
                            'product_price' => $request->product_price,
                            'product_description' => $request->product_description,
                            ]);
        return $update_products->id;
    }
    public function delete(Request $request)
    {
        DB::table('products')->where('id', $request->id)->delete();
        $product_list = DB::table('products')->get();
        return view("list")->with('product_list', $product_list);
    }
}

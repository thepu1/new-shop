<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function addProduct(){
        $categories = Category::where('publication_status',1)->get();
        $brands     = Brand::where('publication_status',1)->get();
        return view('admin.product.add-product',[
            'categories' => $categories,
            'brands'     =>  $brands
        ]);
    }


    protected function productInfoValidation($request){
        $this->validate($request,[
            'product_name' => 'required',
            'product_price' => 'required',
            'product_tax' => 'required',
            'product_quantity' => 'required',
            'short_description' => 'required',
            'long_description' => 'required',
            'product_image' => 'required|image',
            'publication_status' => 'required'
        ]);
    }

    public function newProduct(Request $request){
        $this->productInfoValidation($request);
        Product::addProductInfo($request);
        return redirect('/product/add-product')->with('message','Product Info Add Successfully');
    }


    public function manageProduct(){
       $products = Product::getAllProductInfo();
        return view('admin.product.manage-product',[
            'products'  => $products
        ]);
    }

    public function editProduct($id){
        $product     = Product::find($id);
        $categories  = Category::where('publication_status',1)->get();
        $brands      = Brand::where('publication_status',1)->get();
        return view('admin.product.edit-product',[
            'product'        => $product,
            'categories'     => $categories,
            'brands'         => $brands
        ]);
    }
    public function updateProduct(Request $request){
        $product = Product::find($request->id);
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->product_name = $request->product_name;
        $product->product_price = $request->product_price;
        $product->product_tax = $request->product_tax;
        $product->product_quantity = $request->product_quantity;
        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;
        $product->publication_status = $request->publication_status;


        $image = $request->file('product_image');
        if($image){
            unlink($product->product_image);
            $image_ex = $image->getClientOriginalExtension();
            $image_name = date('YMDHis.').$image_ex;
            $directory = 'product-images/';
            Image::make($image)->resize(300,300)->save($directory.$image_name);
          // $image->move($directory,$image_name);
            $product->product_image = $directory.$image_name;
            $product->save();
            return redirect('/product/manage-product')->with('message','Product Info Update Successfully');
        }
        else{
            $product->save();
            return redirect('/product/manage-product')->with('message','Product Info Update Successfully');
        }

    }

    public function deleteProduct(Request $request){
      $product = Product::find($request->id);
      unlink($product->product_image);
      $product->delete();
      return redirect('/product/manage-product')->with('message','Product Info Delete Successfully');
    }

    public function publishedProduct($id){
        $product = Product::find($id);
        $product->publication_status = 0;
        $product->save();
        return redirect('/product/manage-product')->with('message','Product Info Unpublished Successfully');
    }

    public function unpublishedProduct($id){
        $product = Product::find($id);
        $product->publication_status = 1;
        $product->save();
        return redirect('/product/manage-product')->with('message','Product Info Published Successfully');
    }
}

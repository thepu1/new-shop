<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function addBrand(){
        return view('admin.brand.add-brand');
    }

    protected function brandInfoValidation(Request $request){
        $this->validate($request,[
            'brand_name'    =>  'required',
            'brand_description'    =>  'required',
            'publication_status'    =>  'required',
        ]);
    }

    public function newBrand(Request $request){
        $this->brandInfoValidation($request);
       Brand::create($request->all());
       return redirect('/brand/add-brand')->with('message','Brand Info Add Successfully');
    }

    public function manageBrand(){
        $brands = Brand::all();
        return view('admin.brand.manage-brand',[
            'brands'    => $brands
        ]);
    }

    public function editBrand($id){
          $brand = Brand::find($id);
          return view('admin.brand.edit-brand',[
              'brand'   => $brand
          ]);
    }

    public function updateBrand(Request $request){
        $brand = Brand::find($request->id);
        $brand->brand_name = $request->brand_name;
        $brand->brand_description = $request->brand_description;
        $brand->publication_status = $request->publication_status;
        $brand->save();
        return redirect('/brand/manage-brand')->with('message', 'Brand Info Update Successfully');
    }

    public function deleteBrand(Request $request){
        $brand = Brand::find($request->id);
        $brand->delete();
        return redirect('/brand/manage-brand')->with('message','Brand Info Delete Successfully');
    }

    public function publishedBrand($id){
       $brand = Brand::find($id);
       $brand->publication_status = 0;
       $brand->save();
       return redirect('/brand/manage-brand')->with('message','Brand Info Unpublished Successfully');

    }

    public function unpublishedBrand($id){
        $brand = Brand::find($id);
        $brand->publication_status = 1;
        $brand->save();
        return redirect('/brand/manage-brand')->with('message','Brand Info published Successfully');

    }
}

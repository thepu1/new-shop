<?php

namespace App\Http\Controllers;

use App\Slide;
use Image;
use Illuminate\Http\Request;

class SlideController extends Controller
{
    public function addSlide(){
        return view('admin.slide.add-slide');
    }

    public function newSlide(Request $request){
        $image= $request->file('slide_image');

        $image_ex = $image->getClientOriginalExtension();
        $image_name = date('YMDHis.').$image_ex;
        $diretory = 'slide-images/';
        Image::make($image)->resize(1700,600)->save($diretory.$image_name);

        $slide = new Slide();
        $slide->slide_title = $request->slide_title;
        $slide->slide_image = $diretory.$image_name;
        $slide->publication_status = $request->publication_status;
        $slide->save();
        return redirect('/slide/add-slide')->with('message','Slide Info Add Successfully');

    }
}

<?php

namespace App\Http\Controllers\Home;

use Intervention\Image\ImageManagerStatic as Image;
use App\Models\HomeSlide;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class HomeSliderController extends Controller
{
    public function HomeSlider(){
        $id = Auth::user()->id;
        $homeslide = HomeSlide::find($id);
        return view('admin.home_slide.home_slide_all',compact('homeslide'));
     } // End Method



    public function UpdateSlider(Request $request){

        $slide_id = $request->id;

        if ($request->file('home_slide')) {
            $file = $request->file('home_slide');

            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/home_slide/'),$filename);
            $data['home_slide'] = $filename;

            HomeSlide::findOrFail($slide_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'video_url' => $request->video_url,
                'home_slide' => 'upload/home_slide/'.$filename,
            ]);

            $notification = array(
                'message' => 'Home Slide Updated with your Image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);

            //if ($request->file('home_slide')) {
                //$image = $request->file('home_slide');
                //$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();  // 3434343443.jpg
                //$destinationPath = 'upload/home_slide';

                //$resize_image = Image::make($image->getRealPath());
                //$resize_image->resize(150, 150, function($constraint){ //resize with 150 x 150 ratio
                    //$constraint->aspectRatio();
                //})->save(public_path($destinationPath) . '/' . $name_gen);
                //$save_url = 'upload/home_slide/'.$name_gen;

                //HomeSlide::findOrFail($slide_id)->update([
                    //'title' => $request->title,
                    //'short_title' => $request->short_title,
                    //'video_url' => $request->video_url,
                    //'home_slide' => $save_url,
                //]);
            //$notification = array(
            //'message' => 'Home Slide Updated with Image Successfully',
            //'alert-type' => 'success'
        //);


        } else{

            HomeSlide::findOrFail($slide_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'video_url' => $request->video_url,

            ]);
            $notification = array(
            'message' => 'Home Slide Updated without Image Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

        } // end Else

     } // End Method






}

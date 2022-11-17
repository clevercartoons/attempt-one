<?php

namespace App\Http\Controllers\Home;

use Image;
use App\Models\About;
use App\Models\MultiImage;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    public function AboutPage(){

        $aboutpage = About::find(1);
        return view('admin.about_page.about_page_all',compact('aboutpage'));

     } // End Method

    public function UpdateAbout(Request $request){

        $about_id = $request->id;

        if ($request->file('about_image')) {
            $file = $request->file('about_image');

            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/home_about/'),$filename);
            $data['about_image'] = $filename;

            About::findOrFail($about_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,
                'about_image' => 'upload/home_about/'.$filename,

            ]);
            $notification = array(
            'message' => 'About Page Updated with Image Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

        } else{

            About::findOrFail($about_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,

            ]);
            $notification = array(
            'message' => 'About Page Updated without Image Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

        } // end Else

     } // End Method
    public function HomeAbout(){

        $aboutpage = About::find(1);
        return view('frontend.about_page',compact('aboutpage'));

    }// End Method

    public function AboutMultiImage(){

        return view('admin.about_page.multimage');


    }// End Method
    public function StoreMultiImage(Request $request){

        $image = $request->file('multi_image');

        foreach ($image as $multi_image) {
            $filename = date('YmdHi').$multi_image->getClientOriginalName();
            $multi_image->move(public_path('upload/multi/'),$filename);
            $data['multi_image'] = $filename;

            MultiImage::insert([

                'multi_image' => $filename,
                'created_at' => Carbon::now()
            ]);
        } // End of the froeach


            $notification = array(
            'message' => 'Multi Image Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);


    }// End Method
    public function AllMultiImage(){

        $allMultiImage = MultiImage::all();
        return view('admin.about_page.all_multiimage',compact('allMultiImage'));

    }// End Method
    public function DeleteMultiImage($id){

        $multi = MultiImage::findOrFail($id);
        $img = $multi->multi_image;
        unlink("upload/multi/$img");

        MultiImage::findOrFail($id)->delete();

        $notification = array(
            'message' => ' $id Image Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }// End Method
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class PostController extends Controller
{

    public function writePost(){
        $category = DB::table('categories')->get();
        return view('post.writepost',compact('category'));
    }

    public function allPost(){
        $post = DB::table('posts')->get();
        //return response()->json($category);
        return view('post.all_post',compact('post'));
    }

    public function addPost(Request $request){
        $validatedData = $request->validate([
            'title' => 'required|max:200',
            'details' => 'required',
            'image' => 'mimes:jpeg,jpg,png,PNG | max:1000',
        ]);

        $data = array();
       
        $data['category_id'] = $request->category_id;
        $data['title'] = $request->title;
        $data['details'] = $request->details;
        $image = $request->file('image');

        if($image){
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name =  $image_name.'.'.$ext;
            $upload_path = 'public/frontend/img/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);
            $data['image'] = $image_url;

            DB::table('posts')->insert($data);
            $notification = array(
                'messege'=>"Successfully post added",
                'alert-type'=>'success'
            );

            //return response()->json($notification);

            return Redirect()->back()->with($notification);

        }
        else{
            DB::table('posts')->insert($data);
            $notification = array(
                'messege'=>"Successfully post added",
                'alert-type'=>'success'
            );

            //return response()->json($notification);

            return Redirect()->back()->with($notification);
        }


    }
}

?>
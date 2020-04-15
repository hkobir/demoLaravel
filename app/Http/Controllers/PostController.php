<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Exception;
class PostController extends Controller
{

    public function writePost(){
        $category = DB::table('categories')->get();
        return view('post.writepost',compact('category'));
    }

    public function allPost(){
        $post = DB::table('posts')
            ->join('categories',"posts.category_id","categories.id")
            ->select('posts.*','categories.name')
            ->get();
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
    public function viewPost($id){
        $post = DB::table('posts')
            ->join('categories',"posts.category_id","categories.id")
            ->where('posts.id',$id)
            ->first();
        //return response()->json($category);
        return view('post.view_post',compact('post'));
    }

    public function editPost($id){
        $category = DB::table('categories')->get();
        $post = DB::table('posts')->where('id',$id)->first();
        return view('post.edit_post',compact('category','post'));
    }

    public function updatePost(Request $request,$id){
        $validatedData = $request->validate([
            'title' => 'required|max:200',
            'details' => 'required',
            'image' => 'mimes:jpeg,jpg,png,PNG | max:1000',
        ]);

        $data = array();


        $data['title'] = $request->title;
        $data['category_id'] = $request->category_id;
        $data['details'] = $request->details;
        $image = $request->file('image');

        if($image){
            //add new image and remove old image

            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name =  $image_name.'.'.$ext;
            $upload_path = 'public/frontend/img/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);
            $data['image'] = $image_url;


            //unlink old image from project path
            unlink($request->old_photo);


            $post = DB::table('posts')->where('id',$id)->update($data);
            if($post){
                $notification = array(
                    'messege'=>"Successfully updated",
                    'alert-type'=>'success'
                );

                //return response()->json($notification);


            }
            else{
                $notification = array(
                    'messege'=>"Nothing to update",
                    'alert-type'=>'error'
                );

            }



            //return response()->json($notification);

            return Redirect()->route('all.post')->with($notification);

        }
        else{
            $data['image'] = $request->old_photo;

            try{
                $post = DB::table('posts')->where('id',$id)->update($data);
            }
            catch(Exception $e){
                dd($e->getMessage());
            }

            if($post){
                $notification = array(
                    'messege'=>"Successfully updated",
                    'alert-type'=>'success'
                );

                //return response()->json($notification);


            }
            else{
                $notification = array(
                    'messege'=>"Nothing to update",
                    'alert-type'=>'error'
                );

            }

            return Redirect()->route('all.post')->with($notification);
        }
    }

    public function deletePost($id){
        $cat = DB::table('posts')->where('id',$id)->first();

        $old_image = $cat->image;
        $post = DB::table('posts')->where('id',$id)->delete();
        if($post){
            unlink($old_image); //remove old image
            $notification = array(
                'messege'=>"Successfully deleted",
                'alert-type'=>'warning'
            );

            //return response()->json($notification);

            return Redirect()->back()->with($notification);
        }
        else{
            $notification = array(
                'messege'=>"something went wrong",
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
        }
    }
}

?>
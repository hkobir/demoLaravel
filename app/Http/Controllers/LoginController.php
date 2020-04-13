<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
class LoginController extends Controller
{
    public function getContact(){
        return view('pages.contact');
    }
    public function getAbout(){
        return view('pages.about');
    }
    

    public function addCategory(){
        return view('post.add_category');
    }
    
    
    public function allCategory(){
        $category = DB::table('categories')->get();
        //return response()->json($category);
        return view('post.all_category',compact('category'));
    }
    public function storeCategory(Request $request){
        //retrieve user value
        
        $validatedData = $request->validate([
            'name' => 'required|unique:categories|max:25|min:3',
            'slug' => 'required|unique:categories|max:25|min:4',
        ]);
        
        
        $data = array();
        $data['name'] = $request->name;
        $data['slug'] = $request->slug;
        
        //return response()->json($data);
        $category = DB::table('categories')->insert($data);
        if($category){
            $notification = array(
                'messege'=>"Successfully inserted",
                'alert-type'=>'success'
            );
            
            //return response()->json($notification);
            
            return Redirect()->route('all.category')->with($notification);
        }
        else{
            $notification = array(
                'messege'=>"something went wrong",
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
        }
    }
    
    public function viewCategory($id){
        $category = DB::table('categories')->where('id',$id)->first();
        return view('post.category_view')->with('cat',$category);
    }
        
    public function deleteCategory($id){
        $category = DB::table('categories')->where('id',$id)->delete();
        if($category){
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
    
    
    public function editCategory($id){
        $category = DB::table('categories')->where('id',$id)->first();
        return view('post.edit_category')->with('cat',$category);
    }
    
    public function updateCategory(Request $request,$id){
        $validatedData = $request->validate([
            'name' => 'required|max:25|min:3',
            'slug' => 'required|max:25|min:4',
        ]);


        $data = array();
        $data['name'] = $request->name;
        $data['slug'] = $request->slug;

        //return response()->json($data);
        $category = DB::table('categories')->where('id',$id)->update($data);
        if($category){
            $notification = array(
                'messege'=>"Successfully updated",
                'alert-type'=>'success'
            );

            //return response()->json($notification);

            return Redirect()->route('all.category')->with($notification);
        }
        else{
            $notification = array(
                'messege'=>"Nothing to update",
                'alert-type'=>'error'
            );
            return Redirect()->route('all.category')->with($notification);
        }
    }
}

?>
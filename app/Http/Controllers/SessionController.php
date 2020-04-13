<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function setSession(Request $request,$name){
        if($request->session()->put('name',$name)){
            echo 'session added successfully';
        }
        else{
            echo 'error occured to store';
        }
        
    }
    public function getSession(Request $request,$name){
        if($request->session()->has($name)){
            echo "hello ";
            echo $request->session()->get($name);
        }
        else{
            echo "there is no session with $name";
        }
    }
    public function removeSession(Request $request,$name){
        $request->session()->forget($name);
        echo "session has been removed";
    }
    public function removeAllSession(Request $request){
        if($request->session()->flush())
        echo "all session has been removed";
    }
}

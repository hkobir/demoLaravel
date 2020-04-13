<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UploadFileController extends Controller
{
    public function index(){
        return view('uploadfile');
    }
    public function showFile(Request $request){
        $file = $request->file('content');
        echo "File name: ".$file->getClientOriginalName();
        echo "<br>";
        
        echo "File extension: ".$file->getClientOriginalExtension();
        echo "<br>";
        
        echo "File path: ".$file->getRealPath();
        echo "<br>";
        $fSize = $file->getSize()/1024;
        echo "File size: ".round($fSize,1,PHP_ROUND_HALF_UP)."KB";
        echo "<br>";
        
        echo "File type: ".$file->getMimeType();   //file type
        echo "<br>";
        
        $destination = 'uploads';
        $file->move($destination,$file->getClientOriginalName());
    }
    

}

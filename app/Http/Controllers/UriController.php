<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UriController extends Controller
{
   public function index(Request $request){
       $path = $request->path();
       echo "Path method: ".$path;
       echo "</br>";
   }
}
?>
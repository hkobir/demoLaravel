<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CookieController extends Controller
{
    public function setCookie(Request $request){
        $minuite = 1;
        $response = new Response('Cookie set successfully!');
        $response->withCookie(cookie('name','HKobir',$minuite));
        return $response;
    }

    public function getCookie(Request $request){
        $value = $request->cookie('name');
        echo $value;
        echo "</br>after specific time cookie expired";
    }
}

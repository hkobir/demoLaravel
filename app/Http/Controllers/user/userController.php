<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class userController extends Controller
{
    public function getUser(){
        echo "User is Kobir";
    }
    public function getId(){
        echo "User ID is CSE1010";
    }
    public function goPage(){
        return view('welcome');
    }
}

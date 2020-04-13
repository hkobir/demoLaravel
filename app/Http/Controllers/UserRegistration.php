<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserRegistration extends Controller
{
    public function postRegister(Request $request){
        //retrieve user value
        $name = $request->input('name');
        echo "Name: ". $name;
        echo "</br>";

        $username = $request->input('username');
        echo "User Name: ". $username;
        echo "</br>";

        $pass = $request->input('password');
        echo "Password: ". $pass;
        echo "</br>";

    }
}
?>
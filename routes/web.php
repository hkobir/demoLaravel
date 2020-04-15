<?php

use Illuminate\Support\Facades\Route;




Route::get('/',"UriController@index");

Route::get('/contact/us',"LoginController@getContact")->name('contact'); 
Route::get('/about/us',"LoginController@getAbout")->name('about'); 


Route::get('/add/category',"LoginController@addCategory")->name('add.category'); 
Route::get('/all/category',"LoginController@allCategory")->name('all.category'); 
Route::post('/store/category',"LoginController@storeCategory")->name('store.category'); 
Route::get('/view/category/{id}',"LoginController@viewCategory"); 
Route::get('/delete/category/{id}',"LoginController@deleteCategory"); 
Route::get('/edit/category/{id}',"LoginController@editCategory"); 
Route::post('/update/category/{id}',"LoginController@updateCategory");

Route::get('/write/post',"PostController@writePost")->name('write.post'); 
Route::post('/add/post',"PostController@addPost")->name('store.post');
Route::get('/all/post',"PostController@allPost")->name('all.post');
Route::get('/view/post/{id}',"PostController@viewPost");
Route::get('/edit/post/{id}',"PostController@editPost");
Route::post('/update/post/{id}',"PostController@updatePost");
Route::get('/delete/post/{id}',"PostController@deletePost");


/*

Route::get('/demo/{name}',function ($name) {             //rout with mkiddleaWare
    echo "Hello world ".$name;
    // return view('welcome');
})->middleware('age');

Route::get('/handle',"user\userController@getId")->middleware('age');

/*
Route::get(md5('/blogus'),function () {                  //route with blade channel and name route within encypted URL
    return view('home',['channel'=>'HK zone']);          //note: encrypt url only possible for name route
    // return view('welcome');
})->name('blog');                                   




Route::get('/user',"user\userController@getUser");      //rout with controller
Route::get('/uid',"user\userController@getId");
Route::get('/main',"user\userController@goPage");
Route::get('/path',"UriController@index");

//prefix
Route::prefix('hkobir')->group(function () {

        Route::get('/about',function () {
            return view('about');
            // return view('welcome');
        });

        Route::get('/contact',function () {
            return view('pages.contact');
            // return view('welcome');
        });

});


//form handle
Route::get('/register', function () {
    return view('pages.register');
});
Route::post('/profile',"UserRegistration@postRegister");      //rout with controller


//cookies routing
Route::get('/cookie/set',"CookieController@setCookie");
Route::get('/cookie/get',"CookieController@getCookie");

//response with json
Route::get('/demoResponse', function () {
    return response()->json(['name'=>'Hkobir','state'=>'Comilla']);
});

Route::get('/statusResponse', function () {
    return response("Hello Succeed",200);
});
Route::get('/log',"LoginController@getLog");

//session management
Route::get('/session/set/{name}',"SessionController@setSession");
Route::get('/session/get/{name}',"SessionController@getSession");
Route::get('/session/remove/{name}',"SessionController@removeSession");
Route::get('/session/removeall',"SessionController@removeAllSession");


//upload  file 
Route::get('/uploadfile',"UploadFileController@index");
Route::post('/uploadfile',"UploadFileController@showFile");
*/

//grade caluclate

Route::get('/calculate/grade',function () {             //rout with mkiddleaWare
    return view('total_subject');
});
Route::post('/total/subject',"GradeController@getTotalSubject")->name('tot.subject');
Route::post('/store/subject/{totSubject}',"GradeController@addSubject");



?>
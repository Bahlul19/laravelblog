<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('pages.index');
// });

// Route::get('/home', function() {
//     return view('home');
// });

// Route::get('/home', function(){
//     $name = "Tausif";
//     return view $this->set(compact('name'));
// });

Route::get('/home', function(){
    $name = request('name');
    return view ('home', 
    [
        'name' => $name
    ]);
});

// Route::get('/', function() {
//     return view('home');
// });

Route::get('/home2', function(){
    $name2 = request('name2');

    return view('home2', 
    [
        'name2' => $name2
    ]);
});

//20-11-19

Route::get('/contact', function(){
    return view('posts.contact');
})->middleware('age');


//posts route
Route::get('/posts/{posts}', 'PostsController@show');
Route::get('/posts.index', 'PostsController@index');

Route::get('/Hello/index', 'HelloController@index');
Route::get('/Hello/aboutus', 'HelloController@aboutus');


Route::get('/', 'PagesController@index');
Route::get('/pages.aboutus', 'PagesController@aboutUs');
Route::get('/pages.contactus', 'PagesController@contactUs');

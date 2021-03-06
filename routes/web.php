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

//Category Routing 
Route::get('/posts.add_category', 'PostsController@addCategory')->name('add.category');
Route::post('/posts.store_category', 'PostsController@storeCategory')->name('store.category');
Route::get('/posts.all_category', 'PostsController@allCategory')->name('all.category');
Route::get('/posts.view_category/{id}', 'PostsController@viewCategory');
Route::get('/posts.delete_category/{id}','PostsController@deleteCategory');
Route::get('/posts.edit_category/{id}','PostsController@editCategory');
Route::post('/posts.update_category/{id}','PostsController@updateCategory');


//Post Routing 
Route::get('/posts.writepost', 'UserPostsController@writePost')->name('add.posts');
Route::post('/posts.store_post', 'UserPostsController@storePost')->name('store.post');
Route::get('/posts.all_post', 'UserPostsController@getAllPost')->name('all.posts');
Route::get('/posts.view_post/{id}', 'UserPostsController@getIndividualPosts');
Route::get('/posts.edit_post/{id}', 'UserPostsController@editPost');
Route::post('/posts.update_posts/{id}','UserPostsController@updatePost');
Route::get('/posts.delete_posts/{id}','UserPostsController@deletePost');

//student Routing
Route::get('/student.add_student', 'StudentsController@student')->name('add.student');
Route::post('/student.store_student', 'StudentsController@storeStudent')->name('store.student');
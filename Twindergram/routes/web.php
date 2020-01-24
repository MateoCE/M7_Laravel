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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/usuaris', function(){
    $users = App\User::all();

    return view("llista_usuaris", ["users"=>$users]);
});

Route::get('/randomPost', function(){
    $post = App\Post::find(rand(1,50));

    return view("random_post", ["post"=>$post]);
})->middleware('auth');

Route::get('/newPost', function(){
    $posts = App\Post::all();

    return view("new_post", ["posts"=>$posts]);
})->middleware('auth');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

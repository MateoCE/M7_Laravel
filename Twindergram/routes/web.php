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

use App\Post;
use App\Comment;
use Illuminate\Http\Request;

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

Route::post('/newPost', function (Request $request) {
    $validator = Validator::make($request::all(), [
        'postText' => 'required|max:255',
    ]);

    $post = new Post();
    $post->text = $request->postText;
    $post->user_id = $request->userId;
    $post->image = "djahdi";
    $post->save();
});

Route::post('/newComment/{postId}', function ($postId, Request $request) {
    
    $comment = new Comment();
    $comment->text = $request->commentText;
    $comment->post_id = $postId;
    $comment->user_id = $request->userId;
    $comment->image = "djahdi";
    $comment->save();

    return redirect()->route('post', $postId);

});

Route::get('/allPosts', function(){
    $posts = App\Post::all()->sortBy("created_at");

    return view("all_posts", ["posts"=>$posts]);
})->middleware('auth');

Route::get('/post/{postId}', function($postId){
    $post = App\Post::find($postId);
    return view("post", ["post"=>$post]);
})->middleware('auth')->name('post');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

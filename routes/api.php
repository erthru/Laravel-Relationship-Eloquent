<?php

use Illuminate\Http\Request;

Route::get('post', function () {
    return response(App\Post::with('author')->get());
});

Route::get('post/{id}', function($id){
    return response(App\Post::with('author')->find($id));
});

Route::post('post', function(Request $request){
    $post = new App\Post;
    $post->title = $request->input('title');
    $post->body = $request->input('body');
    $post->author_id = $request->input('author_id');
    $post->save();
    return response($post);
});

Route::put('post/{id}', function($id, Request $request){
    $post = App\Post::find($id);
    $post->title = $request->input('title');
    $post->body = $request->input('body');
    $post->author_id = $request->input('author_id');
    $post->save();
    return response($post);
});

Route::delete('post/{id}', function($id){
    $post = App\Post::find($id);
    $post->delete();
    return response($post);
});

Route::get('post_byauthor/{id}', function($id){
    return response(App\Post::with('author')->where('author_id',$id)->get());
});

Route::get('author', function(){
    return response(App\Author::all());
});

Route::get('comment', function(){
    return response(App\Comment::with('post')->get());
});

Route::get('comment_bypost/{id}', function($id){
    return response(App\Comment::with('post')->where('post_id',$id)->get());
});


<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        if($posts){
            return response()->json(
                $data = [
                    "posts" => $posts
                ],
                $status = 200
            );
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $post =  Post::create($request->all());

       if($post){
           return response()->json(
               $data = [
               "messge" => "Post has been created successfully"
           ], $status = 201);
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $postData = Post::find($post);
        if($postData){
            return response()->json(
               $data = [
               "post" => $postData
           ], $status = 200);
        }else{

        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
         $postData = Post::find($post->id);
          if($postData){
            $postData->title = $request->title;
            $postData->body = $request->body;
            $postData->save();
            return response()->json(
               $data = [
               "post" => $postData,
               "message" => "Post has been updated successfully."
           ], $status = 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        // $deletedPost = Post::destroy($post->id);
                $deletedPost = Post::find($post->id);
                if($deletedPost){
                    $deletedPost->delete();
                    return response()->json([
                        $data = [
                            "post" => $deletedPost,
                             "message" => "Post has been deleted successfully"
                        ],
                        $status = 200
                    ]);
                }
    }
}

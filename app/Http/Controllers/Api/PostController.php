<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index($id = null){
        if($id)
            $posts = Post::whereId($id)->get();
        else
            $posts = Post::all();
        return response()->json($posts);
    }
}
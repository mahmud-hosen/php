<?php

namespace App\Http\Controllers;
use App\Post;


use Illuminate\Http\Request;

class PostController extends Controller
{
    function allPost()
    {
        return Post::with('comment')->get();

    }
}

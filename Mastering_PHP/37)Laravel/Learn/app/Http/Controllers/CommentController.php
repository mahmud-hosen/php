<?php

namespace App\Http\Controllers;
use App\Comment;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    function allComments()
    {
        return Comment::with('post')->get();

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;


class CommentController extends Controller
{
    public function store(){
$comment=new Comment();
$comment->id;
$comment->content= request()->get('content');
$comment->save();
return redirect()->route('house.index')->with('comment thành công');
    }
}

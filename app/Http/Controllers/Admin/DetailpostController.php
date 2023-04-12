<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class DetailpostController extends Controller
{
    public function index($post_id){

        $post= Post::find($post_id);

       return view('admin.post.details',compact('post'));
    }
}

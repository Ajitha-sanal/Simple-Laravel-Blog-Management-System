<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostdetailsController extends Controller
{
    public function index($post_id){

        $post= Post::find($post_id);

       return view('frontend.post-detail',compact('post'));
    }
}
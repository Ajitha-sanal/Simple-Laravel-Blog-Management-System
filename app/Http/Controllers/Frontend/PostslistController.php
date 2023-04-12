<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Foundation\Http\FormRequest;
use Livewire\WithPagination; 


class PostslistController extends Controller
{
    public function index(){

      
        
      $post = Post::latest()->paginate(6);

        return view('frontend.blog',compact('post'))->with('i',(request()->input('page',1) - 1) * 6);
      
          }
}

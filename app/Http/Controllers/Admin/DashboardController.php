<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        
        $post = Post::latest()->where('created_by','=', Auth::id())->paginate(5);
        
        return view('admin.dashboard',compact('post'))->with('i',(request()->input('page',1) - 1) * 5);

    }
}

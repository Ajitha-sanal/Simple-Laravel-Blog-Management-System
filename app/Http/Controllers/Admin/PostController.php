<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {

        
        $post = Post::latest()->where('created_by','=', Auth::id())->paginate(5);

        return view('admin.post.index',compact('post'))->with('i',(request()->input('page',1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        $category=Category::get();
        return view('admin.post.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => [
                'required',
                'Integer' 
               ],
            'name' => [
                'required',
                'string' ,
                'max:100',
                'regex:/^[\p{Arabic}a-zA-Z\- .ـ]+$/u'
               ],
               'description'=>[
                'required',
                'string' ,
                'max:255'
               ],
                'image'=>[
                'required',
                'mimes:jpg,jpeg,png' 
                   ],
                'navbar_status'=>[
                 'nullable'
                     
                 ],
                 'status'=>[
                 'nullable'
                    
                   ]
                   
        ]);
        
        $input = $request->all();
        if($request['image'])
         
         
        if ($image = $request->file('image')) {
            $destinationPath = 'Posts/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            
            $input['image'] = "$profileImage";
        }
        $input['created_by']=Auth::user()->id;
        Post::create($input);

       return redirect()->route('post.index')->withSuccess('Post Created successfully.');
        

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */public function edit(Post $post): View
    

    {
       
        $category=Category::get();
        return view('admin.post.edit',compact('post','category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, post $post): RedirectResponse
    {
        $request->validate([
            'category_id' => [
                'required',
                'Integer' 
               ],
            'name' => [
                'required',
                'string' ,
                'max:100',
                'regex:/^[\p{Arabic}a-zA-Z\- .ـ]+$/u'
               ],
               'description'=>[
                'required',
                'string' ,
                'max:255'
               ],
                 'image'=>[
                    'required',
                    'mimes:jpg,jpeg,png' 
                   ],
                    'navbar_status'=>[
                    'nullable'
                     
                   ],
                   'status'=>[
                    'nullable'
                    
                   ]
                   
        ]);

        $input = $request->all();
  
        if ($image = $request->file('image')) {
            $destinationPath = 'posts/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }
    
        $post->update($input);
      
        return redirect()->route('post.index')->withSuccess('Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post): RedirectResponse
    {
        $post->delete();

        return redirect()->route('post.index')->withSuccess('Post deleted successfully.');
    }
}

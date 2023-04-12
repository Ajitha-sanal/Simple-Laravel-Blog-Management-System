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




class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        $category = Category::latest()->paginate(5);

        return view('admin.category.index',compact('category'))->with('i',(request()->input('page',1) - 1) * 5);
   
    
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => [
                'required',
                'string' ,
                'max:100',
                'regex:/^[\p{Arabic}a-zA-Z\- .ـ]+$/u'

                
            ],
               'slug'=>[
                'required',
                'string' ,
                'max:100'
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
            $destinationPath = 'uploads/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            
            $input['image'] = "$profileImage";
        }
    
        Category::create($input);

       return redirect()->route('category.index')->withSuccess('Category Created successfully.');
        


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
     */
    public function edit(Category $category): View
    {
        return view('admin.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    //public function update(CategoryFormRequest $request , $category_id){
        public function update(Request $request, category $category): RedirectResponse
        
    {
        $request->validate([
            'name' => [
                'required',
                'string' ,
                'max:100',
                'regex:/^[\p{Arabic}a-zA-Z\- .ـ]+$/u'
                
               ],
               'slug'=>[
                'required',
                'string' ,
                'max:100'
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
                    
                   ],
        ]);

        $input = $request->all();
  
        if ($image = $request->file('image')) {
            $destinationPath = 'uploads/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }
    
        $category->update($input);
      
        return redirect()->route('category.index')->withSuccess('Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($category): RedirectResponse
    {

      $category=Category::find($category);
      if($category){
        $destination = 'uploads/'.$category->image;
        if(File::exists($destination)){
            File::delete($destination);
        }
       

      }

         $category->posts()->delete();

        $category->delete();

        return redirect()->route('category.index')->withSuccess('Category deleted with its pots successfully.');
    }
}

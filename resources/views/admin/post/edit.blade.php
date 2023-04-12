@extends('layouts.master')
@section ('title','Category')

@section('content')

<div class="container-fluid px-4">
                        <div class="card mt-4">
                            <div class="card-header">
                                <h4 class="">Edit Post</h4>
                        </div>

                        <div class="card-body">

                       @if($errors->any())
                       <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                        <div>{{$error}}</div></div>
                        @endforeach
                        @endif
                        @method('PUT')

                        <form action="{{ route('post.update',$post->id) }}" method="POST" enctype="multipart/form-data">
   
   @csrf
    @method('PUT')
                       <div class="mb-3">
                        <label for="">Post Title</label>
                        <input type="text" class="form-control" name="name" value="{{ $post->name}}">
                       </div>

                       
                       <div class="mb-3">
                       <label for="">Description</label>
                        <textarea type="text" class="form-control" name="description">{{ $post->description}}</textarea>
                       </div>

                       <div class="mb-3">
                       <label for="">Image</label>
                        <input type="file" class="form-control" name="image" value="{{ $post->image}}">
                        <img src="{{asset('Posts/'. $post->image)}}" alt="img" width="50px" height="50px">
                       </div>

                       <div class="mb-3">
                       <label for="">Category</label>
                       <select class="form-control m-bot15" name="category_id" required>
                       <option value="">--select Category--</option>
                       
    @foreach($category as $category)
        <option value="{{ $category->id }}" {{ $post->category_id==$category->id ?'selected':''     }}>{{ $category->name }}</option>    
@endforeach


</select>
                       </div>

                      <h6>Status Mode</h6>

                      <div class="row">

                      <div class="col-md-3 mb-3">
                       <label for="">Navbar Status</label>
                        <input type="checkbox"  name="navbar_status" {{ $post -> navbar_status=='1' ? 'checked' : ''}}>
                       </div>

                       <div class="col-md-3 mb-3">
                       <label for="">Status</label>
                        <input type="checkbox" name="status" {{ $post -> status=='1' ? 'checked' : ''}}>
                       </div>
                       <div class="col-md-6">

                       <button type="submit" class="btn btn-primary">update Post</button>

                       </div>

                       </div> 












</form>
                            
</div>
</div>
                        
</div>

@endsection
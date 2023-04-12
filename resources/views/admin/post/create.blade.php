@extends('layouts.master')
@section ('title','Post')

@section('content')

<div class="container-fluid px-4">
                        <div class="card mt-4">
                            <div class="card-header">
                                <h4 class="">Create Post</h4>
                        </div>

                        <div class="card-body">

                       @if($errors->any())
                       <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                        <div>{{$error}}</div></div>
                        @endforeach
                        @endif

                        <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
   @csrf
                       <div class="mb-3">
                        <label for="">Post Title</label>
                        <input type="text" class="form-control" name="name">
                       </div>

                       <div class="mb-3">
                       <label for="">Description</label>
                        <textarea type="text" class="form-control" name="description"></textarea>
                       </div>

                       <div class="mb-3">
                       <label for="">Category</label>
                       <select class="form-control m-bot15" name="category_id">

                       
    @foreach($category as $category)
        <option value="{{ $category->id }}">{{ $category->name }}</option>    
@endforeach


</select>
                       </div>

                       

                       <div class="mb-3">
                       <label for="">Image</label>
                        <input type="file" class="form-control" name="image">
                       </div>

                       

                      <h6>Status Mode</h6>

                      <div class="row">

                      <div class="col-md-3 mb-3">
                       <label for="">Navbar Status</label>
                        <input type="checkbox"  name="navbar_status">
                       </div>

                       <div class="col-md-3 mb-3">
                       <label for="">Status</label>
                        <input type="checkbox"  name="status">
                       </div>
                       <div class="col-md-6">

                       <button type="submit" class="btn btn-primary">Save Post</button>

                       </div>

                       </div> 












</form>
                            
</div>
</div>
                        
</div>

@endsection
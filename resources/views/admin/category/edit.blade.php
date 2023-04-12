@extends('layouts.master')
@section ('title','Category')

@section('content')

<div class="container-fluid px-4">
                        <div class="card mt-4">
                            <div class="card-header">
                                <h4 class="">Edit Category</h4>
                        </div>

                        <div class="card-body">

                       @if($errors->any())
                       <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                        <div>{{$error}}</div></div>
                        @endforeach
                        @endif
                        @method('PUT')

                        <form action="{{ route('category.update',$category->id) }}" method="POST" enctype="multipart/form-data">
   
   @csrf
    @method('PUT')
                       <div class="mb-3">
                        <label for="">Category name</label>
                        <input type="text" class="form-control" name="name" value="{{ $category->name}}">
                       </div>

                       <div class="mb-3">
                       <label for="">Slug</label>
                        <input type="text" class="form-control" name="slug" value="{{ $category->slug}}">
                       </div>


                       <div class="mb-3">
                       <label for="">Image</label>
                        <input type="file" class="form-control" name="image" value="{{ $category->image}}">
                        <img src="{{asset('uploads/category/'. $category->image)}}" alt="img" width="50px" height="50px">
                       </div>

                       

                      <h6>Status Mode</h6>

                      <div class="row">

                      <div class="col-md-3 mb-3">
                       <label for="">Navbar Status</label>
                        <input type="checkbox"  name="navbar_status" {{ $category -> navbar_status=='1' ? 'checked' : ''}}>
                       </div>

                       <div class="col-md-3 mb-3">
                       <label for="">Status</label>
                        <input type="checkbox" name="status" {{ $category -> status=='1' ? 'checked' : ''}}>
                       </div>
                       <div class="col-md-6">

                       <button type="submit" class="btn btn-primary">update Category</button>

                       </div>

                       </div> 












</form>
                            
</div>
</div>
                        
</div>

@endsection
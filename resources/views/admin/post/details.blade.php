@extends('layouts.master')
@section ('title','Blog  Dashboard')

@section('content')

<div class="container-fluid px-4">
                        
                        
                        <div class="card mt-4">
                            <div class="card-header">
                                <h4 class="">{{$post->name}}</h4>
                        </div>

                        <div class="card-body">
                       <p>Category : {{$post->category->name}}</p>
                                          
                       <p>
    <img src="{{asset('Posts/'. $post->image)}}" alt="img" width="500px" height="350px">
</p>
<p>Created at :{{$post->created_at}}</p>
<p>{{$post->description}}</p>







</tr>




     
                        
</div>

@endsection
@extends('layouts.app')
@section('content')

<div class="container">
        <div class="row">
            <div class="col-md-12">
              <div class="section-heading" style="text-align: left;
	margin-bottom: 60px;
	border-bottom: 1px solid #eee;">
                <h2> {{$post->name}}</h2><h6 style="text-transform: lowercase;">{{$post->category->name}}/{{$post->name}}</h6>


              </div>
            </div>
            <div class="page-heading about-heading header-text" >
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="text-content">
            <img src="{{asset('Posts/'. $post->image)}}" class="w-100" alt=""  >
            </div>
          </div>
        </div>
      </div>
    </div>
            <div class="col-md-8">
           
            
                <p>
               <h5 style="font-size: 18px;
	font-weight: 400;
	color: #1e1e1e;
	margin-bottom: 15px;"> Posted By:{{$post->user->name}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Posted at: {{$post->created_at}}</h5>
                {{$post->description}}
                
</p>
                </div>

       
      </div>


              
             
@endsection
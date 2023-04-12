@extends('layouts.app')
@section('content')




<div class="page-heading about-heading header-text" style="background-image: url({{asset('images/Background.jpg)')}};padding: 210px 0px 130px 0px;
	text-align: center;
	background-position: center center;
	background-repeat: no-repeat;
	background-size: cover;margin-top:-25px;" >
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              
              <h1 style="color:white;font-size:50px">BLOG</h1>
            </div>
          </div>
        </div>
      </div>
    </div>
   
    <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="row">
           
@foreach($post as $post_item)
              <div class="col-md-4" style="margin-top: 100px;position: relative;">
                <div class="service-item">
                  <a href="blog-details.html" class="services-item-image"><img src="{{asset('Posts/'. $post_item->image)}}" class="img-fluid" alt=""  ></a>

                  <div class="down-content" style="padding:30px">
                    <h4 style="font-size: 17px;
	color: #1a6692;
	margin-bottom: 20px;"><a href="{{url('frontend/post-detail').$post_item->id  }}">{{$post_item->name}}</a></h4>

                    <p style="margin: 0;margin-bottom:20px"> {{$post_item->user->name}} &nbsp;&nbsp;|&nbsp;&nbsp; {{$post_item->created_at}}</p>
                  </div>
                </div>
              </div>
              
              @endforeach
              
              

              <div class="col-md-12">
              {{ $post->links() }}
              </div>
            </div>
          </div>

        
        </div>
      </div>
@endsection
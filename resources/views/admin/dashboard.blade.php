@extends('layouts.master')
@section ('title','Blog  Dashboard')

@section('content')

<div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        
                        <div class="card mt-4">
                            <div class="card-header">
                                <h4 class="">View Posts</h4>
                        </div>

                        <div class="card-body">
                       
                                          
                      

<table class=" table table-bordered">
<thead>

<tr>
<th>ID</th>
<th>Post Title</th>
<th>Category</th>
<th>Image</th>
<th>Created At</th>
<th>Action</th>



</tr>
</thead>
<tbody>
  @foreach($post as $item)  
</tbody>
<tr>
<td>{{ ++$i }}</td>
<td>{{$item->name}}</td>

<td>{{$item->category->name}}</td>

<td>
    <img src="{{asset('Posts/'. $item->image)}}" alt="img" width="50px" height="50px">
</td>
<td>{{$item->created_at}}</td>

<td><a class="btn btn-primary" href="{{url('admin/post-detail').$item->id  }}">View</a></td>

</tr>

@endforeach
</table>
{!! $post->links() !!}


     
                        
</div>

@endsection
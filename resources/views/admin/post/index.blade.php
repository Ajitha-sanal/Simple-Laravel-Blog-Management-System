

@extends('layouts.master')
@section ('title','Posts')

@section('content')

<div class="container-fluid px-4">
                        <div class="card mt-4">

<div class="card-header">
<h4>View Posts <a href="{{ route('post.create')}}" class="btn btn-primary btn-sm float end">Add Post</a></h4>

</div>
<div class="card-body">
@if(session('status'))

          <div class="alert alert-success">{{session('status')}}</div>
              @endif

<table class="table table-bordered">
<thead>

<tr>
<th>ID</th>
<th>Post Title</th>

<th>Category</th>
<th>Image</th>

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

<td>
<form action="{{ route('post.destroy',$item->id) }}" method="POST">
				
				
				
				<a class="btn btn-primary" href="{{ route('post.edit',$item->id)}}">Edit</a>
				
				@csrf
				@method('DELETE')
				
				<button type="submit" class="btn btn-danger">Delete</button>
        <a class="btn btn-success" href="{{url('admin/post-detail').$item->id  }}">View</a>
			</form>

      
</td>


</tr>

@endforeach
</table>
{!! $post->links() !!}
</div>




                        </div>

          
              

                        
</div>

@endsection
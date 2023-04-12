

@extends('layouts.master')
@section ('title','Category')

@section('content')

<div class="container-fluid px-4">
                        <div class="card mt-4">

<div class="card-header">
<h4>View category <a href="{{ route('category.create')}}" class="btn btn-primary btn-sm float end">Add Category</a></h4>

</div>
<div class="card-body">
@if(session('status'))

          <div class="alert alert-success">{{session('status')}}</div>
              @endif

<table class="table table-bordered">
<thead>

<tr>
<th>ID</th>
<th>Category Name</th>
<th>Image</th>
<th>Status</th>
<th>Action</th>

</tr>
</thead>
<tbody>
  @foreach($category as $item)  
</tbody>
<tr>
<td>{{ ++$i }}</td>
<td>{{$item->name}}</td>
<td>
    <img src="{{asset('uploads/'. $item->image)}}" alt="img" width="50px" height="50px">
</td>
<td>{{ $item-> status=='1' ? 'Hidden':'Shown' }}</td>
<td>
<form action="{{ route('category.destroy',$item->id) }}" method="POST">
				
				
				
				<a class="btn btn-primary" href="{{ route('category.edit',$item->id)}}">Edit</a>
				
				@csrf
				@method('DELETE')
				
				<button type="submit" class="btn btn-danger">Delete</button>
			</form>


</td>


</tr>

@endforeach
</table>
{!! $category->links() !!}
</div>




                        </div>

          
              

                        
</div>

@endsection
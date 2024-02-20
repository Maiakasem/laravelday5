@extends('layout.main')
@section('title','Users')
@section('content')
<table class="table">
     <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
    </tr>
</thead>
 <tr>
      
      <td>{{$user-> id}}</td>
      <td>{{$user-> name}}</td>
      <td>{{$user-> email}}</td>
      
    </tr>
    <tr>
</table>

@foreach ($user->posts as $post )
    <div class="card text-center m-5">
        <div class="card-header">
          <h5 class="card-title">{{$post->title}}</h5> 
        </div>
        <div class="card-body">
            <p class="card-text">{{$post->body}}</p>
            <img src="{{asset(str_replace('public/','storage/', $post->img))}}" alt="" width="300">
        </div>
    <div class="card-footer text-body-secondary">
        1 hour ago 
    </div>
</div>
@endforeach
@endsection

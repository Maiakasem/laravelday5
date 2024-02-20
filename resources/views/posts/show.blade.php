@extends('layout.main')
@section('title', $postData->title)

@section('content')
<div class="card text-center">
    <div class="card-header">
    {{$postData->title}}
    </div>
    <div class="card-body">
      
        <p class="card-text">{{$postData->body}}</p>
      
        <img src="{{asset(str_replace('public/','storage/', $postData->img))}}" alt="" width="300">
        <br>
        <br>
        <a href="{{ route('users.show', ['id'=>$postData->user->id], false) }}" class="btn btn-primary">{{$postData->user->name}}</a>
    </div>
    <div class="card-footer text-body-secondary">
        1 hour ago 
    </div>
</div>
@endsection

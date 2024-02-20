@extends('layout.main')
@section('title', 'Create Post')

@section('content')
<form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Post Title</label>
            <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Post Title" value="{{ old('title') }}">
            @error('title')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Post Body</label>
            <input type="text" name="body" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Post Description" value="{{ old('body') }}">
            @error('body')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
        
        
        @error('user_id')
                <span class="text-danger">{{ $message }}</span>
        @enderror
        </div>
        <div class="form-group">
        <input type="file" name="img">
        </div>
        @error('img')
                <span class="text-danger">{{ $message }}</span>
        @enderror
        <br>
        <div class="col-sm-3 mt-4">
            <input type="text" name="user_id" value="{{ $loggedInUser->id }}" hidden >
            
        </div>
        <button type="submit" class="btn btn-primary mt-4">Create</button>
</form>
@endsection

@extends('layout.main')
@section('title', 'Edit Post')

@section('content')
<form class="mt-5" action="{{ route('posts.update', ['postId'=>$postData['id']], false) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="formGroupExampleInput" class="form-label">Post Title</label>
        <input type="text" name="title" class="form-control" id="formGroupExampleInput" placeholder="Enter Post Title " value="{{ $postData['title'] }}">
        @error('title')
                <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-3">
        <label for="formGroupExampleInput" class="form-label">Post Description</label>
        <input type="text" name="body" class="form-control" id="formGroupExampleInput" placeholder="Enter Post body " value="{{ $postData['body'] }}">
        @error('body')
                <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-sm-3">
    <input type="text" name="user_id" value="{{ $loggedInUser->id }}" hidden >
    </div>
    <div class="form-group">
        <input type="file" name="img">
    </div>
    <button type="submit" class="btn btn-success mt-4">Update</button>
</form>
@endsection

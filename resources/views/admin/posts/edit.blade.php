@extends('layouts.admin')

@section('content');
    @include('includes.tinyeditor')
    <h1>Edit Post</h1>

    <div class="row">
    <div class="col-sm-3">
        <img src="{{ $post->photo->file ?? 'http://placehold.it/400x400'}}" alt="" class="img-responsive img-rounded">
    </div>

    <div class="col-sm-9">

        <form action="http://codehacking.test/admin/posts/{{ $post->id }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            @method('PATCH')
            <div class="form-group">
                <input type="text" class="form-control" name="title" placeholder="Enter title" value="{{ $post->title }}">
            </div>

            <div class="form-group">
                <select class="form-control" id="category_id" name="category_id">
                    @foreach ($categories as $category)
                        @if($post->category_id == $category->id)
                            <option value={{ $category->id }} selected>{{ $category->name }}</option>
                        @else
                            <option value={{ $category->id }}>{{ $category->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>   

            <div class="form-group">
                <input type="file" class="form-control" name="photo_id">
            </div>

            <div class="form-group">
                <textarea class="form-control" name="body" placeholder="Write Content">{{ $post->body }}</textarea>
            </div>

            <div class="form-group">
                <input class="btn btn-primary" type="submit" name="submit" value="Update Post">
            </div>
        </form>

        <form action="http://codehacking.test/admin/posts/{{ $post->id }}" method="POST">
            @csrf
            @method('DELETE')
            <div class="form-group">
                <input class="btn btn-danger" type="submit" name="submit" value="Delete Post">
            </div>
        </form>

    </div>
    </div>

    <div class="row">
        @include('includes.form_error')
    </div>

@endsection
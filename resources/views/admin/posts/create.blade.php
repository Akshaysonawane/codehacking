@extends('layouts.admin')

@section('content')
    <h1>Create Post</h1>
    <div class="row">
    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="form-group">
            <input type="text" class="form-control" name="title" placeholder="Enter Title">
        </div>

        <div class="form-group">
            <select class="form-control" id="category_id" name="category_id">
                <option value="" selected>Choose Options</option>
                @foreach ($categories as $category)
                <option value={{ $category->id }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <input type="file" class="form-control" name="photo_id">
        </div>

        <div class="form-group">
            <textarea class="form-control" name="body" placeholder="Write Content"></textarea>
        </div>

        <div class="form-group">
            <input class="btn btn-primary" type="submit" name="submit" value="Create Post">
        </div>
    </form>
    </div>
    <div class="row">
        @include('includes.form_error')
    </div>
@endsection
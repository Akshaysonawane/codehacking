@extends('layouts.admin')

@section('content')
    <h1>Update Category</h1>

    <div class="col-sm-6">
        <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            @method('PATCH')
            <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="Enter Name" value="{{ $category->name }}">
            </div>
            <div class="form-group">
                <input class="btn btn-primary" type="submit" name="submit" value="Update Category">
            </div>
        </form>
    </div>

    <div class="col-sm-6">
        <form action="http://codehacking.test/admin/categories/{{ $category->id }}" method="POST">
            @csrf
            @method('DELETE')
            <div class="form-group">
                <input class="btn btn-danger" type="submit" name="submit" value="Delete Category">
            </div>
        </form>
    </div>
@endsection
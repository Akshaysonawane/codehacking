@extends('layouts.admin')

@section('content')
    <h1>Categories</h1>

    <div class="col-sm-6">
        <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="Enter Name">
            </div>
            <div class="form-group">
                <input class="btn btn-primary" type="submit" name="submit" value="Create Category">
            </div>
        </form>
    </div>

    <div class="col-sm-6">

        @if($categories)

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Created</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td><a href="{{ route('categories.edit', $category->id) }}">{{ $category->name }}</a></td>
                        <td>{{ $category->created_at ?? 'no date'}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
@endsection
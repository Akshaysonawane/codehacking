@extends('layouts.admin')

@section('content');
    <h1>Edit User</h1>

    <div class="row">
    <div class="col-sm-3">
        <img src="{{ $user->photo->file ?? 'http://placehold.it/400x400'}}" alt="" class="img-responsive img-rounded">
    </div>

    <div class="col-sm-9">

        <form action="http://codehacking.test/admin/users/{{ $user->id }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            @method('PATCH')
            <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="Enter Name" value="{{ $user->name }}">
            </div>

            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Enter Email" value="{{ $user->email }}">
            </div>

            <div class="form-group">
                <select class="form-control" id="role_id" name="role_id">
                    @foreach ($roles as $role)
                        @if($user->role_id == $role->id)
                            <option value={{ $role->id }} selected>{{ $role->name }}</option>
                        @else
                            <option value={{ $role->id }}>{{ $role->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <select class="form-control" id="is_active" name="is_active">
                    @if($user->is_active == 1)
                        <option value="1" selected>Active</option>
                        <option value="0">Not Active</option>
                     @else   
                        <option value="1">Active</option>
                        <option value="0" selected>Not Active</option>
                    @endif
                </select>
            </div>    

            <div class="form-group">
                <input type="file" class="form-control" name="photo_id">
            </div>

            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Enter Password">
            </div>

            <div class="form-group">
                <input class="btn btn-primary" type="submit" name="submit" value="Update User">
            </div>
        </form>

        <form action="http://codehacking.test/admin/users/{{ $user->id }}" method="POST">
            @csrf
            @method('DELETE')
            <div class="form-group">
                <input class="btn btn-danger" type="submit" name="submit" value="Delete User">
            </div>
        </form>

    </div>
    </div>

    <div class="row">
        @include('includes.form_error')
    </div>

@endsection
@extends('layouts.admin')

@section('content');
    <h1>Create User</h1>

    <form action="http://codehacking.test/admin/users" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="form-group">
            <input type="text" class="form-control" name="name" placeholder="Enter Name">
        </div>

        <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="Enter Email">
        </div>

        <!--<div class="form-group">
            <input type="text" class="form-control" name="status" placeholder="Enter Status">
        </div>-->

        <div class="form-group">
                <select class="form-control" id="role_id" name="role_id">
                    <option value="" selected>Choose Options</option>
                    @foreach ($roles as $role)
                    <option value={{ $role->id }}>{{ $role->name }}</option>
                    @endforeach
                </select>
        </div>

        <div class="form-group">
            <select class="form-control" id="is_active" name="is_active">
                <option value="1">Active</option>
                <option value="0" selected>Not Active</option>
            </select>
        </div>    

        <div class="form-group">
            <input type="file" class="form-control" name="file">
        </div>

        <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Enter Password">
        </div>

        <div class="form-group">
            <input class="btn btn-primary" type="submit" name="submit" value="Create User">
        </div>
    </form>

    @include('includes.form_error')

@endsection
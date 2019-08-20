@extends('layouts.admin')

@section('content')
    <h1>Media</h1>
    @if($photos)
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Created</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($photos as $photo)
                <tr>
                  <td>{{ $photo->id }}</td>
                  <td><a href="{{ route('media.edit', $photo->id) }}"><img height="50" src="{{ $photo->file ?? 'http://placehold.it/400x400'}}" alt=""></a></td>
                  <td>{{ $photo->created_at ?? 'no date'}}</td>
                  <td>
                      <form action="{{ route('media.destroy', $photo->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <div class="form-group">
                            <input class="btn btn-danger" type="submit" name="submit" value="Delete">
                        </div>
                      </form>
                  </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endif
@endsection
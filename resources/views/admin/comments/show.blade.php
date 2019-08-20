@extends('layouts.admin')

@section('content')

    @if(count($comments) > 0)
    <h1>Comments</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Author</th>
                <th>Email</th>
                <th>Body</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($comments as $comment)
                <tr>
                    <td>{{ $comment->id }}</td>
                    <td>{{ $comment->author }}</td>
                    <td>{{ $comment->email }}</td>
                    <td>{{ $comment->body }}</td>
                    <td><a href="{{ route('home.post', $comment->post->id) }}">View Post</a></td>

                    <td>
                        @if($comment->is_active == 1)
                            <form action="{{ route('comments.update', $comment->id) }}" role="form" method="post">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="is_active" value="0">
                                <button type="submit" class="btn btn-success">Un-approve</button>
                            </form>
                        @else
                            <form action="{{ route('comments.update', $comment->id) }}" role="form" method="post">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="is_active" value="1">
                                <button type="submit" class="btn btn-info">Approve</button>
                            </form>
                        @endif
                    </td>

                    <td>
                        <form action="{{ route('comments.destroy', $comment->id) }}" role="form" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
    @else
        <h1 class="text-centre">No Comments</h1>
    @endif
@endsection    
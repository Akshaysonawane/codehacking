@extends('layouts.admin')

@section('content')

    @if(count($replies) > 0)
    <h1>Replies</h1>
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
            @foreach ($replies as $reply)
                <tr>
                    <td>{{ $reply->id }}</td>
                    <td>{{ $reply->author }}</td>
                    <td>{{ $reply->email }}</td>
                    <td>{{ $reply->body }}</td>
                    <td><a href="{{ route('home.post', $reply->comment->post->id) }}">View Post</a></td>

                    <td>
                        @if($reply->is_active == 1)
                            <form action="{{ route('replies.update', $reply->id) }}" role="form" method="post">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="is_active" value="0">
                                <button type="submit" class="btn btn-success">Un-approve</button>
                            </form>
                        @else
                            <form action="{{ route('replies.update', $reply->id) }}" role="form" method="post">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="is_active" value="1">
                                <button type="submit" class="btn btn-info">Approve</button>
                            </form>
                        @endif
                    </td>

                    <td>
                        <form action="{{ route('replies.destroy', $reply->id) }}" role="form" method="post">
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
        <h1 class="text-centre">No Replies</h1>
    @endif
@endsection    
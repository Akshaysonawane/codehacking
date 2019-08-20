@extends('layouts.blog-post')

@section('content')
        <!-- Blog Post -->

                <!-- Title -->
                <h1>{{ $post->title }}</h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#">{{ $post->user->name }}</a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted {{ $post->created_at->diffForHumans() }}</p>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src="{{ $post->photo->file }}" alt="">

                <hr>

                <!-- Post Content -->
                <p>{{ $post->body }}</p>

                <hr>

                @if(Session::has('comment message'))
                    {{ session('comment message') }}
                @endif

                <!-- Blog Comments -->

                @if(Auth::check())

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form action="{{ route('comments.store') }}" role="form" method="post">
                        @csrf
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        <div class="form-group">
                            <textarea class="form-control" name="body" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit comment</button>
                    </form>
                </div>
                @endif
                <hr>

                <!-- Posted Comments -->
                @if(count($comments) > 0)
                <!-- Comment -->
                @foreach($comments as $comment)
                <div id="nested-comment" class="media">
                    <a class="pull-left" href="#">
                        <img height="64" class="media-object" src="{{ $comment->photo ?? 'http://placehold.it/64x64' }}" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">{{ $comment->author }}
                            <small>{{ $comment->created_at->diffForHumans() }}</small>
                        </h4>
                        <p>{{ $comment->body }}</p>

                         @if(count($comment->replies) > 0)   
                        <!-- Nested Comment -->
                        @foreach($comment->replies as $reply)

                        @if($reply->is_active == 1)
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img height="64" class="media-object" src="{{ $reply->photo ?? 'http://placehold.it/64x64' }}" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">{{ $reply->author }}
                                    <small>{{ $reply->created_at->diffForHumans() }}</small>
                                </h4>
                                <p>{{ $reply->body }}</p>
                            </div>

                            <div class="comment-reply-container">
                                <button class="toggle-reply btn btn-primary pull-right">Reply</button>

                                <div class="comment-reply col-sm-6" style="display:none">


                            <form action="{{ route('replies.createReply') }}" role="form" method="post">
                                @csrf
                                <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                                <div class="form-group">
                                    <textarea class="form-control" name="body" rows="1"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit reply</button>
                            </form>
                                    </div>

                        </div>
                        <!-- End Nested Comment -->
                    </div>
                        @else
                            <h1 class="text-center">No Replies</h1>
                        @endif
                        @endforeach
                        @endif

                    </div>
                </div>
                @endforeach
                @endif

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <div class="input-group">
                        <input type="text" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    <!-- /.input-group -->
                </div>

                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>

@endsection

@section('scripts')
    <script>
        $(".comment-reply-container .toggle-reply").click(function(){
            $(this).next().slideToggle("slow");
        });
    </script>            
@endsection
@extends('layouts.blog-post')


@section('content')


    <!-- Blog Post -->

    <!-- Title -->
    <h1>{{$post->title}}</h1>

    <!-- Author -->
    <p class="lead">
        by <a href="#">{{$post->user->name}}</a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p><span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at->diffForHumans()}}</p>

    <hr>

    <!-- Preview Image -->
    <img class="img-responsive" src="{{$post->photo->file}}" alt="">

    <hr>

    <!-- Post Content -->
    <p class="lead">{{$post->body}}</p>

    <hr>

    <!-- Blog Comments -->

    <!-- Comments Form -->
    {{session('comment_message')}}
    <div class="well">
        <h4>Leave a Comment:</h4>
            	{!! Form::open([ 'method' => 'POST','action' => 'PostCommentsController@store']) !!}

                        <input type="hidden" name="post_id" value="{{$post->id}}">
            			<div class="form-group">
            				{!! Form::label('body', 'Body :'); !!}
            				{!! Form::textarea('body',null, ['class' => 'form-control' , 'rows'=>3]) !!}
            			</div>

            			<div class="form-group">
            				{!! Form::submit('Submit',['class' => 'btn btn-primary']) !!}

            			</div>

            		{!! Form::close() !!}
    </div>

    <hr>

    <!-- Posted Comments -->
@if(count($comments)>0)
    <!-- Comment -->
    @foreach($comments as $comment)
    <div  class=" media nested-comment">
        <a class="pull-left" href="#">
            <img height="64" width="64" class="media-object" src="{{$comment->photo}}" alt="">
        </a>
        <div class="media-body">
            <h4 class="media-heading">{{$comment->author}}
                <small>{{$comment->created_at->diffForHumans()}}</small>
            </h4>
           <p>{{$comment->body}}</p>
            <!-- Nested Comment -->
            @if(count($comment->replies))
                @foreach($comment->replies as $reply)
                    @if($reply->is_active == 1)

                        <div style="margin-top: 40px" class="media">
                            <a class="pull-left" href="#">
                                <img height="64" width="64" class="media-object" src="{{$reply->photo}}" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">{{$reply->author}}
                                    <small>{{$reply->created_at->diffForHumans()}}</small>
                                </h4>
                                <p>{{$reply->body}}</p>
                            </div>
                        </div>

                    @endif

                @endforeach
            <!-- End Nested Comment -->
            @endif
            <div class="comment-reply-container">
                <button class="toggle-reply btn btn-primary pull-right">Reply</button>
                <div class="comment-reply col-sm-6" style="display: none">
                    {!! Form::open([ 'method' => 'POST','action' => 'CommentRepliesController@createReply']) !!}

                    <input type="hidden" name="comment_id" value="{{$comment->id}}">

                    <div class="form-group">
                        {!! Form::label('body', 'Reply :'); !!}
                        {!! Form::textarea('body',null, ['class' => 'form-control','rows'=>1]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::submit('Submit',['class' => 'btn btn-primary']) !!}

                    </div>

                    {!! Form::close() !!}

                </div>

            </div>
        </div>
    </div>
    @endforeach
@endif

    <!-- Comment -->
    <div class="media">
        <a class="pull-left" href="#">
            <img class="media-object" src="http://placehold.it/64x64" alt="">
        </a>
        <div class="media-body">
            <h4 class="media-heading">Start Bootstrap
                <small>August 25, 2014 at 9:30 PM</small>
            </h4>
            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

        </div>
    </div>

</div>

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
    </div>

@endsection
@section('scripts')

    <script>
        $(".comment-reply-container .toggle-reply").click(function () {
            $(this).next().slideToggle("slow");
        })
    </script>


@endsection

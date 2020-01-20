@extends('layouts.admin')

@section('content')

<h1>Posts</h1>

    <table class="table table-hover">
       <thead>
          <tr>
              <th>Id</th>
              <th>Photo</th>
              <th>User</th>
              <th>category</th>
              <th>Title</th>
              <th>Body</th>
              <th>Post Link</th>
              <th>Comments</th>
              <th>Created</th>
              <th>Updated</th>
          </tr>
       </thead>
       <tbody>
       @if($posts)
           @foreach($posts as $post)
          <tr>
              <td>{{$post->id}}</td>
              <td><img src="{{$post->photo ? $post->photo->file : 'http://placeholde.it/50x50'}}" alt="" class="img-responsive img-rounded"></td>
              <td><a href="{{route('posts.edit',$post->id)}}">{{$post->user->name}}</a></td>
              <td>{{$post->category ? $post->category->name : "Un categorized"}}</td>
              <td>{{$post->title}}</td>
              <td>{{$post->body}}
              <td><a href="{{route('home.post',$post->id)}}">View Post</a></td>
              <td><a href="{{route('comments.show',$post->id)}}">View Comments</a></td>
              <td>{{$post->created_at->diffForHumans()}}</td>
              <td>{{$post->updated_at->diffForHumans()}}</td>
          </tr>
           @endforeach
       @endif
       </tbody>
    </table>

@endsection

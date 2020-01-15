@extends('layouts.admin')

@section('content')

<h1>Posts</h1>

    <table class="table table-bordered">
       <thead>
          <tr>
              <th>Id</th>
              <th>Photo</th>
              <th>User</th>
              <th>category</th>
              <th>Title</th>
              <th>Body</th>
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
              <td>{{$post->body}}</td>
              <td>{{$post->created_at->diffForHumans()}}</td>
              <td>{{$post->updated_at->diffForHumans()}}</td>
          </tr>
           @endforeach
       @endif
       </tbody>
    </table>

@endsection

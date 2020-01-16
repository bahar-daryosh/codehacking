@extends('layouts.admin')
@section('content')

    <h1>Media</h1>

    @if(isset($photos))
        {{@csrf_field()}}
        <table class="table table-hover">
       <thead>
          <tr>
              <th>Id</th>
              <th>Name</th>
              <th>Created</th>
              <th>Updated</th>
          </tr>
       </thead>
       <tbody>

       @foreach($photos as $photo)
          <tr>
              <td>{{$photo->id}}</td>
              <td><img height="50" src="{{$photo->file ? $photo->file : 'http://placeholde.it/50x50'}}" alt=""></td>
              <td>{{$photo->created_at ? $photo->created_at->diffForHumans() : 'no date'}}</td>
              <td>{{$photo->updated_at ? $photo->updated_at->diffForHumans() : 'no date'}}</td>
          </tr>
       @endforeach
       </tbody>
    </table>
    @endif


@endsection

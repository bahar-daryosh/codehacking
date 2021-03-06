@extends('layouts.admin')

@section('content')

<h1>Users</h1>

    <table class="table table-hover">
       <thead>
          <tr>
              <th>Id</th>
              <th>Photo</th>
              <th>Name</th>
              <th>Email</th>
              <th>Role</th>
              <th>Status</th>
              <th>Created</th>
              <th>Updated</th>
          </tr>

       </thead>
       <tbody>
         @if($users)

             {{@csrf_field()}}

             @foreach($users as $user)


                 <tr>
                     <td>{{$user->id}}</td>
                     <td><img src="{{$user->photo ? $user->photo->file : 'http://placeholde.it/50x50'}}" alt="" class="img-responsive img-rounded"></td>
                     <td><a href="{{route('users.edit',$user->id)}}">{{$user->name}}</a></td>
                     <td>{{$user->email}}
                     <td>{{$user->role ? $user->role->name : "guest"}}</td>
                     <td>{{$user->is_active == 1 ? 'Active' : 'Not Active'}}</td>
                     <td>{{$user->created_at->diffForHumans()}}</td>
                     <td>{{$user->updated_at->diffForHumans()}}</td>
                 </tr>
             @endforeach
         @endif

       </tbody>
    </table>

    @endsection

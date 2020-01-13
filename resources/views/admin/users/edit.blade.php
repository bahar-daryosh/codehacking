@extends('layouts.admin')

@section('content')

    <h1>Edit User</h1>


    {!! Form::model($user , [ 'method' => 'PATCH','action'=>['AdminUsersController@update',$user->id],'url' => 'admin/users', 'files' => true]) !!}

    {{@csrf_field()}}

    <div class="form-group">
        {!! Form::label('name', 'User name'); !!}
        {!! Form::text('name',null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('email', 'Email:'); !!}
        {!! Form::email('email',null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('role_id', 'Role'); !!}
        {!! Form::select('role_id',$roles,null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('is_active', 'Status'); !!}
        {!! Form::select('is_active',array( 1=> 'Active' , 0 => 'Not Active'),null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('photo_id','Title:'); !!}
        {!! Form::file('photo_id',null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('password', 'Password:'); !!}
        {!! Form::password('password', ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('create user',['class' => 'btn btn-primary']) !!}

    </div>
    {!! Form::close() !!}
    @include('includes.form_error')
@endsection

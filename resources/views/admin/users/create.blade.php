@extends('layouts.admin')

@section('content')

    <h1>Create Users</h1>

    	{!! Form::open([ 'method' => 'POST','url' => 'admin/users', 'files' => true]) !!}
    			<div class="form-group">
    				{!! Form::label('name', 'User name'); !!}
    				{!! Form::text('name',null, ['class' => 'form-control']) !!}
    			</div>


    			<div class="form-group">
    				{!! Form::submit('create user',['class' => 'btn btn-primary']) !!}

    			</div>
    		{!! Form::close() !!}
@endsection

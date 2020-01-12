@extends('layouts.admin')

@section('content')

    <h1>Create Users</h1>


    	{!! Form::open([ 'method' => 'POST','url' => 'admin/users', 'files' => true]) !!}

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
                    {!! Form::select('role_id',[''=>'Choose Options'] + $roles,null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('status', 'Status'); !!}
                   	{!! Form::select('status',array( 1=> 'Active' , 0 => 'Not Active'),null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password', 'Password:'); !!}
                   	{!! Form::text('password',null, ['class' => 'form-control']) !!}
                </div>

    			<div class="form-group">
    				{!! Form::submit('create user',['class' => 'btn btn-primary']) !!}

    			</div>
    		{!! Form::close() !!}
    @include('includes.form_error')
@endsection

@extends('layouts.admin')


@section('content')


    <h1>Edit Category</h1>

    <div class="col-sm-6">
        {!! Form::model($category ,[ 'method' => 'PATCH','action'=>['AdminCategoriesController@update' , $category->id]]) !!}

        <div class="form-group">
            {!! Form::label('name', 'Name :'); !!}
            {!! Form::text('name',null, ['class' => 'form-control']) !!}
        </div>



        <div class="form-group">

            {!! Form::submit('Update Category',['class' => 'btn btn-primary col-sm-6']) !!}

        </div>

        {!! Form::close() !!}

        	{!! Form::open([ 'method' => 'DELETE','action'=>['AdminCategoriesController@destroy', $category->id]]) !!}



        			<div class="form-group">
        				{!! Form::submit('Delete Category',['class' => 'btn btn-primary col-sm-6']) !!}

        			</div>

        		{!! Form::close() !!}
    </div>

    <div class="col-sm-6">
        @if($categories)
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Created date</th>
                    <th>Updated date</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td><a href="{{route('categories.edit', $category->id)}}">{{$category->name}}</a></td>
                        <td>{{$category->created_at ? $category->created_at->diffForHumans() : "no date"}}
                        <td>{{$category->updated_at ? $category->updated_at->diffForHumans() : "no date"}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif

    </div>

@endsection

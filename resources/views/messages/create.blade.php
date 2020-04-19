@extends('layouts.app')

@section('title')Message - @endsection

@section('content')
    <h1>Create Message</h1>
    {!! Form::open(['action' => 'MessageController@store', 'method' => 'POST']) !!}
        <div class="form form-group">
            {{Form::label('user_id','Username')}}
            {{Form::text('user_id',$user_id,['class' => 'form-control', 'placeholder' => 'Username'])}}
        </div>
        <div class="form form-group">
            {{Form::label('message','Message')}}
            {{Form::textarea('message','',['class' => 'form-control', 'placeholder' => 'Message'])}}
        </div>
        {{Form::submit('Submit',['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection
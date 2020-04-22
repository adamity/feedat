@extends('layouts.app')

@section('title')Message - @endsection

@section('content')
    <h1>Create Message</h1>
    {!!Form::open(['action' => 'MessageController@store', 'method' => 'POST'])!!}
            {{Form::hidden('user_id',$user_id)}}
        <div class="form form-group">
            {{Form::label('message','Message')}}
            {{Form::textarea('message','',['class' => 'form-control', 'placeholder' => 'Message'])}}
        </div>
        {{Form::submit('Submit',['class' => 'btn btn-primary'])}}
    {!!Form::close()!!}
@endsection
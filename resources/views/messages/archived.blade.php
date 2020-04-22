@extends('layouts.app')

@section('title')Archived Message - @endsection

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Archived Messages</div>
                <div class="panel-body">
                    @if(count($messages) > 0)
                        @foreach ($messages as $message)
                            <div class="well">
                                <p>{{$message->message}}</p>
                                <small>- Anonymous ( {{$message->created_at}} )</small><br>
                                <sub>
                                    <a href="/" class="btn btn-default">Share Response</a>
                                    {!!Form::open(['action' => ['MessageController@destroy', $message->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                        {{Form::hidden('_method','DELETE')}}
                                        {{Form::submit('Delete',['class' => 'btn btn-default'])}}
                                    {!!Form::close()!!}
                                </sub>
                            </div>
                        @endforeach
                    @else
                        <p>No Messages Found</p>
                    @endif
                    <a href="/message" class="btn btn-default">Messages</a>
                </div>
            </div>
        </div>
    </div>
@endsection
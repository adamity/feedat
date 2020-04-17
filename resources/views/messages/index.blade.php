@extends('layouts.app')

@section('title')My Message - @endsection

@section('content')
    <h1>Messages</h1>
    @if(count($messages) > 0)
        @foreach ($messages as $message)
            <div class="well">
                <p>{{$message->message}}</p>
                <small>- Anonymous ( {{$message->created_at}} )</small><br>
                <sub>
                    <a href="/" class="btn btn-default">Share Response</a>
                    <a href="/" class="btn btn-default">Archive</a>
                    <a href="/" class="btn btn-default">Delete</a>
                </sub>
            </div>
        @endforeach
    @else
        <p>No Posts Found</p>
    @endif
@endsection
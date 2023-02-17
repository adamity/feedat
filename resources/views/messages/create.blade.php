@extends('layouts.app')

@section('title')
    Message -
@endsection

@section('subtitle')
    Write Message
@endsection

@section('content')
    <form action="{!! route('sendmessage') !!}" method="POST">
        {!! csrf_field() !!}
        <input type="hidden" name="user_id" id="user_id" value="{{ $user_id }}">

        <div class="form form-group">
            <label for="message">Message</label>
            <textarea class="form form-control" name="message" id="message" cols="30" rows="10" placeholder="Enter Message"></textarea>
        </div>

        <input class="btn btn-primary" type="submit" name="submit" id="submit" value="Submit">
    </form>
@endsection

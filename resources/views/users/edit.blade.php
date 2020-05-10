@extends('layouts.app')

@section('title')Settings - @endsection

@section('content')
@section('subtitle')Settings @endsection
<form action="{!! route('updateinfo') !!}" method="POST">
    {!! csrf_field() !!}
    <div class="form form-group">
        <label for="user_id">Username</label>
        <input class="form form-control" type="text" name="user_id" id="user_id" placeholder="Enter Username" value="{{$user->user_id}}">
    </div>

    <div class="form form-group">
        <label for="email">Email</label>
        <input class="form form-control" type="email" name="email" id="email" placeholder="Enter Email" value="{{$user->email}}">
    </div>

    <input class="btn btn-default" type="submit" name="submit" id="submit" value="Save Change">

    <a href="/change-password" class="btn btn-default">Change Password</a>
    <a href="/user" class="btn btn-default">Cancel</a>
    <a href="/delete-account" class="btn btn-danger pull pull-right">Delete Account</a>
</form>
@endsection
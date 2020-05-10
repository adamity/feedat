@extends('layouts.app')

@section('title')Settings - @endsection

@section('content')
@section('subtitle')Settings @endsection
<form>
    <div class="form form-group">
        <label for="user_id">Username</label>
        <input class="form form-control" type="text" name="user_id" id="user_id" value="{{$user->user_id}}" readonly>
    </div>

    <div class="form form-group">
        <label for="email">Email</label>
        <input class="form form-control" type="email" name="email" id="email" value="{{$user->email}}" readonly>
    </div>
    
    <a href="/edit-info" class="btn btn-default">Edit</a>
    <a href="/home" class="btn btn-default">Cancel</a>
</form>
@endsection
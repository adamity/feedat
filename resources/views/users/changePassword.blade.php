@extends('layouts.app')

@section('title')Change Password - @endsection

@section('content')
@section('subtitle')Change Password @endsection
<form action="{!! route('changepassword') !!}" method="POST">
    {!! csrf_field() !!}
    <div class="form form-group">
        <label for="current_password">Current Password</label>
        <input class="form form-control" type="password" name="current_password" id="current_password">
    </div>
    
    <div class="form form-group">
        <label for="new_password">New Password</label>
        <input class="form form-control" type="password" name="new_password" id="new_password">
    </div>

    <div class="form form-group">
        <label for="confirm_new_password">Confirm New Password</label>
        <input class="form form-control" type="password" name="confirm_new_password" id="confirm_new_password">
    </div>
    
    <input class="btn btn-default" type="submit" name="submit" id="submit" value="Save Change">
    
    <a href="/home" class="btn btn-default">Cancel</a>
</form>
@endsection
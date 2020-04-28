@extends('layouts.app')

@section('title')Settings - @endsection

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Settings</div>
                <div class="panel-body">
                    <a href="/change-username" class="btn btn-default">Change Username</a>
                    <a href="/change-email" class="btn btn-default">Change Email</a>
                    <a href="/change-password" class="btn btn-default">Change Password</a>
                    <a href="/delete-account" class="btn btn-danger">Delete Account</a>
                </div>
            </div>
        </div>
    </div>
@endsection
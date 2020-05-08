@extends('layouts.app')

@section('title')Settings - @endsection

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Settings</div>
                <div class="panel-body">
                    {!!Form::open(['action' => ['UserController@update', $user->user_id], 'method' => 'POST'])!!}
                        <div class="form form-group">
                            {{Form::label('user_id','Username')}}
                            {{Form::text('user_id', $user->user_id, ['class' => 'form form-control', 'placeholder' => 'Enter Username'])}}
                        </div>
                        
                        <div class="form form-group">
                            {{Form::label('email','Email')}}
                            {{Form::email('email', $user->email, ['class' => 'form form-control', 'placeholder' => 'Enter Email'])}}
                        </div>

                        {{Form::hidden('_method', 'PUT')}}
                        {{Form::submit('Save Change', ['class' => 'btn btn-default'])}}
                        
                        <a href="/change-password" class="btn btn-default">Change Password</a>
                        <a href="/user" class="btn btn-default">Cancel</a>
                        <a href="/delete-account" class="btn btn-danger pull pull-right">Delete Account</a>
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
@endsection
@extends('layouts.app')

@section('title')Delete Account - @endsection

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Delete Account</div>
                <div class="panel-body">
                    <p>You are about to delete your feedat account, are you sure to proceed?</p>
                    <a href="/user" class="btn btn-default">Cancel</a>
                    {!!Form::open(['action' => ['UserController@destroy', $user=Auth::user()->user_id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                        {{Form::hidden('_method','DELETE')}}
                                        {{Form::submit('Yes, Delete Now!',['class' => 'btn btn-danger'])}}
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
@endsection
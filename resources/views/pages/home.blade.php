@extends('layouts.app')

@section('title')My Profile - @endsection

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Feedboard</div>
                <div class="panel-body">
                    <p id="usrname" onclick="copyToClipboard('#usrname')" class="btn btn-default">feedat.test/{{Auth::user()->user_id}}</p>
                    <a href="/message" class="btn btn-default">View Messages</a>
                    <a href="/setting" class="btn btn-default">Settings</a>
                </div>
            </div>
        </div>
    </div>
@endsection

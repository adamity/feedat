@extends('layouts.app')

@section('title')My Profile - @endsection

@section('content')
@section('subtitle')Feedboard @endsection
<p id="usrname" onclick="copyToClipboard('#usrname')" class="btn btn-default">feedat.test/{{Auth::user()->user_id}}</p>
<a href="/message" class="btn btn-default">View Messages</a>
<a href="/user" class="btn btn-default">Settings</a>
@endsection

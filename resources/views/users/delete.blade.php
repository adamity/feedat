@extends('layouts.app')

@section('title')
    Delete Account -
@endsection

@section('subtitle')
    Delete Account
@endsection

@section('content')
    <p>You are about to delete your feedat account, are you sure to proceed?</p>
    <a href="/home" class="btn btn-default">Cancel</a>
    <form class="pull pull-right" action="{!! route('destroy') !!}" method="POST">
        {!! csrf_field() !!}
        {!! method_field('DELETE') !!}
        <input class="btn btn-danger" type="submit" name="submit" id="submit" value="Yes, Delete Now!">
    </form>
@endsection

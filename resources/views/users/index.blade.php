@extends('layouts.app')

@section('title')Settings - @endsection

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Settings</div>
                <div class="panel-body">
                    
                    <form>
                        <div class="form form-group">
                            <label for="user_id">Username</label>
                            <input class="form form-control" type="text" name="user_id" id="user_id" value="{{$user->user_id}}" readonly>
                        </div>
                        
                        <div class="form form-group">
                            <label for="email">Email</label>
                            <input class="form form-control" type="email" name="email" id="email" value="{{$user->email}}" readonly>
                        </div>
                        <a href="user/{{$user->user_id}}/edit" class="btn btn-default">Edit</a>
                        <a href="/home" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
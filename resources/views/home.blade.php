@extends('layouts.app')

@section('title')My Profile - @endsection

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Feedboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <a href="/" class="btn btn-default">Share Profile Link</a>
                    <a href="/message" class="btn btn-default">View Messages</a>
                    <a href="/" class="btn btn-default">Settings</a>
                </div>
            </div>
        </div>
    </div>
@endsection

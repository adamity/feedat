@extends('layouts.default')

@section('title')
    Home -
@endsection

@section('content')
    <div class="d-flex flex-column justify-content-center align-items-center vh-100 text-center text-dark">
        <img src="{{ asset('img/feedat-logo.png') }}" class="img-logo" alt="feedat logo">
        <h1 class="font-weight-bold">Feedat!</h1>
        <p class="mb-6">Receive constructive feedback from your friends and co-workers.</p>

        <a href="{{ route('login') }}" class="btn btn-default rounded-pill min-w-300px mb-5">Login</a>
        <a href="{{ route('register') }}" class="btn btn-default rounded-pill min-w-300px">Register</a>
    </div>
@endsection

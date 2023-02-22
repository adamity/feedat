@extends('layouts.default')

@section('title')
    Home -
@endsection

@section('content')
    <div class="d-flex flex-column justify-content-center align-items-center vh-100 text-center text-dark">
        <img src="{{ asset('img/feedat-logo.png') }}" class="img-logo" alt="feedat logo">
        <h1 class="font-weight-bold">Feedat!</h1>
        <p class="mb-6">Receive constructive feedback from your friends and co-workers.</p>
        <p class="d-inline-block bg-danger-subtle border border-danger rounded-pill text-danger user-select-none small fw-semibold px-3 py-1 mb-6" data-bs-toggle="tooltip" data-bs-title="This is a demo site, all the date will be deleted without notice.">Demo Only ⓘ</p>

        <a href="{{ route('login') }}" class="btn btn-default rounded-pill min-w-300px mb-5">Login</a>
        <a href="{{ route('register') }}" class="btn btn-default rounded-pill min-w-300px">Register</a>
    </div>
@endsection

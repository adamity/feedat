<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function home()
    {
        return view('pages.home');
    }

    public function setting()
    {
        return view('users.index');
    }

    public function deleteAccount()
    {
        return view('users.delete');
    }
}

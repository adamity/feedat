<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\User;
use Auth;
use Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        return view('users.index')->with('user',$user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$user_id = $id;
        //echo $user_id;
        //return $id;
        //$user_id = $id->user;
        $user = User::where('user_id',$id)->first();
        //echo $user->id;
        return view('users.edit')->with('user',$user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //return "Hello World";
        $this->validate($request, ['user_id' => 'required','email' => 'required']);

        // Update user
        $user = User::where('user_id',$id)->first();
        $user->user_id = $request->input('user_id');
        $user->email = $request->input('email');
        $user->save();

        return redirect('/user')->with('success','User Information Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::check())
        {
            $user = User::where('user_id',$id);
            $user->delete();
            $messages = Message::all()->where('user_id',$id);
            if(count($messages)>0)
            {
                foreach($messages as $message)
                {
                    $message->delete();
                }
            }
            return view('auth.register');
        }
        else
        {
            return view('pages.index');
        }
    }

    public function editPassword()
    {
        return view('users.changePassword');
    }

    public function updatePassword(Request $request)
    {
        $this->validate($request, [
            'current_password' => ['required','min:6'], 
            'new_password' => ['required','min:6'],
            'confirm_new_password' => ['required','min:6']
            ]);

        if(!Hash::check($request->get('current_password'), Auth::user()->password))
        {
            return back()->with('error', 'Current Password Mismatch');
        }
        else if($request->get('current_password') === $request->get('new_password'))
        {
            return back()->with('error', 'New Password Must Be Different From Current Password');
        }
        else if(!($request->get('new_password') === $request->get('confirm_new_password')))
        {
            return back()->with('error', 'New Password And Confirm New Password Must Be The Same');
        }
        else if(Hash::check($request->get('current_password'), Auth::user()->password))
        {
            $user = Auth::user();
            $user->password = bcrypt($request->input('new_password'));
            $user->save();

            return redirect('/user')->with('success','Password Change Successfully');

            // Last Here, Password Not Save
        }
        else
        {
            return view('pages.index');
        }
    }
}

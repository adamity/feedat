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

    public function show()
    {
        $user = Auth::user();
        return view('users.index')->with('user',$user);
    }

    public function editInfo()
    {
        $user = Auth::user();
        return view('users.edit')->with('user',$user);
    }

    public function updateInfo(Request $request)
    {
        $this->validate($request, ['user_id' => 'required','email' => 'required']);

        $user = Auth::user();
        $user->user_id = $request->input('user_id');
        $user->email = $request->input('email');
        $user->save();

        return redirect('/user')->with('success','User Information Updated');
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
            return redirect()->back()->with('error', 'Current Password Mismatch');
        }
        else if($request->get('current_password') === $request->get('new_password'))
        {
            return redirect()->back()->with('error', 'New Password Must Be Different From Current Password');
        }
        else if(!($request->get('new_password') === $request->get('confirm_new_password')))
        {
            return redirect()->back()->with('error', 'New Password And Confirm New Password Must Be The Same');
        }
        else if(Hash::check($request->get('current_password'), Auth::user()->password))
        {
            $user = Auth::user();
            $user->password = bcrypt($request->input('new_password'));
            $user->save();

            return redirect('/user')->with('success','Password Change Successfully');
        }
        else
        {
            return view('pages.index');
        }
    }

    public function destroy()
    {
        $user = Auth::user();
        $user->delete();
        $messages = Message::all()->where('user_id',$user->user_id);
        if(count($messages)>0)
        {
            foreach($messages as $message)
            {
                $message->delete();
            }
        }
        return redirect('/')->with('success','Your Account Was Successfully Deleted');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\User;
use Auth;

class MessageController extends Controller
{
    public function index()
    {
        if(Auth::check())
        {
            $user = Auth::user()->user_id;
            $query = ['user_id' => $user,'archive' => false];
            $messages = Message::where($query)->orderBy('id','desc')->paginate(10);
            return view('messages.index')->with('messages', $messages);
        }
        else
        {
            return redirect('/login');
        }
    }

    public function create($id)
    {
        $user = User::where('user_id', '=', $id)->first();

        if($user != null)
        {
            if(Auth::check())
            {
                $currentUser = Auth::user()->user_id;
                $targetUser = $user->user_id;
                if($targetUser === $currentUser)
                {
                    return redirect('/home');
                }
                else
                {
                    return view('messages.create')->with('user_id',$id);
                }
            }
            else
            {
                return view('messages.create')->with('user_id',$id);
            }
        }
        else
        {
            $errorMessage = "There is no one with the username $id";
            return redirect('/register')->with('error',$errorMessage);
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, ['user_id' => 'required','message' => 'required']);

        $message = new Message;
        $message->user_id = $request->input('user_id');
        $message->message = $request->input('message');
        $message->save();

        if(Auth::check())
        {
            return redirect('/home')->with('success','Message Sent!');
        }
        else
        {
            return redirect('/register')->with('success','Message Sent! Now, It Is Your Turn. Register Now!');
        }
    }

    public function edit($id)
    {
        if(Auth::check())
        {
            $message = Message::find($id);
            $message->archive = true;
            $message->save();
            return redirect('/message')->with('success','Message Archived!');
        }
        else
        {
            return redirect('/login');
        }
    }

    public function archived()
    {
        if(Auth::check())
        {
            $user = Auth::user()->user_id;
            $query = ['user_id' => $user,'archive' => true];
            $messages = Message::where($query)->orderBy('id','desc')->paginate(10);
            return view('messages.archived')->with('messages', $messages);
        }
        else
        {
            return redirect('/login');
        }
    }

    public function destroy($id)
    {
        if(Auth::check())
        {
            $message = Message::find($id);
            $message->delete();
            return redirect()->back()->with('success','Message Removed!');
        }
        else
        {
            return redirect('/login');
        }
    }
}

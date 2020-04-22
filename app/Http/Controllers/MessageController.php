<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use Auth;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check())
        {
            $user = Auth::user()->user_id;
            //$messages = Message::all()->where('user_id',$user);
            $query = ['user_id' => $user,'archive' => false];
            $messages = Message::where($query)->orderBy('id','desc')->paginate(10);
            return view('messages.index')->with('messages', $messages);
        }
        else
        {
            return view('pages.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('messages.create')->with('user_id',$id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['user_id' => 'required','message' => 'required']);

        // Create Message
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $message = Message::find($id);
        return $message;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $message = Message::find($id);
        $message->archive = true;
        $message->save();
        return redirect('/message')->with('success','Message Archived!');
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
        //Message::where('archive',$id)->update($request->all());
        //return redirect('/messages');
        //return view("Update");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $message = Message::find($id);
        $message->delete();
        return redirect()->back()->with('success','Message Removed!');
    }

    public function archived()
    {
        if(Auth::check())
        {
            $user = Auth::user()->user_id;
            //$messages = Message::all()->where('user_id',$user);
            $query = ['user_id' => $user,'archive' => true];
            $messages = Message::where($query)->orderBy('id','desc')->paginate(10);
            return view('messages.archived')->with('messages', $messages);
        }
        else
        {
            return view('pages.index');
        }
    }
}

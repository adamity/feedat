@extends('layouts.app')

@section('title')Change Password - @endsection

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Change Password</div>
                <div class="panel-body">
                    <form action="{!! route('changepassword') !!}" method="POST">
                        {!! csrf_field() !!}
                        <div class="form form-group">
                            <label for="current_password">Current Password</label>
                            <input class="form form-control" type="password" name="current_password" id="current_password">
                        </div>
                        
                        <div class="form form-group">
                            <label for="new_password">New Password</label>
                            <input class="form form-control" type="password" name="new_password" id="new_password">
                        </div>

                        <div class="form form-group">
                            <label for="confirm_new_password">Confirm New Password</label>
                            <input class="form form-control" type="password" name="confirm_new_password" id="confirm_new_password">
                        </div>
                        
                        <input class="btn btn-default" type="submit" name="submit" id="submit" value="Save Change">
                        {{-- <a href="#" class="btn btn-default">Save Change</a> --}}
                        <a href="/home" class="btn btn-default">Cancel</a>
                    </form>

                    {{-- {!!Form::open(['action' => ['UserController@updatePassword', $user->user_id], 'method' => 'POST'])!!}
                        <div class="form form-group">
                            {{Form::label('current_password','Current Password')}}
                            {{Form::password('current_password', '', ['class' => 'form form-control', 'placeholder' => 'Enter Current Password'])}}
                        </div>
                        
                        <div class="form form-group">
                            {{Form::label('new_password','New Password')}}
                            {{Form::password('new_password', '', ['class' => 'form form-control', 'placeholder' => 'Enter New Password'])}}
                        </div>

                        <div class="form form-group">
                            {{Form::label('confirm_new_password','Confirm New Password')}}
                            {{Form::password('confirm_new_password', '', ['class' => 'form form-control', 'placeholder' => 'Enter Confirm New Password'])}}
                        </div>

                        {{Form::hidden('_method', 'PUT')}}
                        {{Form::submit('Save Change', ['class' => 'btn btn-default'])}}
                        
                        <a href="/home" class="btn btn-default">Cancel</a>
                    {!!Form::close()!!} --}}
                </div>
            </div>
        </div>
    </div>
@endsection
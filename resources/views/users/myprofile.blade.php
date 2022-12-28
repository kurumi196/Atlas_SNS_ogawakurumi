@extends('layouts.login')

@section('content')
<div class="mp_area d-flex">
    <div class="mp_left">
        <img class="icon" src="{{ '/storage/'.Auth()->user()->images }}" alt="your-image">
    </div>
    <div class="mp_edit w-100">
    @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
    @endforeach
    {!! Form::open(['url'=>'edit/myprofile','files' => true,'enctype'=>'multipart/form-data']) !!}
    <ul>
        <li>
            {!! Form::label('userName','user name') !!}
            {!! Form::text('username',$user->username,['id'=>'userName','class'=>'','placeholder'=>'']) !!}
        </li>
        <li>
            {!! Form::label('','mail address') !!}
            {!! Form::email('mail',$user->mail,['id'=>'','class'=>'','placeholder'=>'']) !!}
        </li>
        <li>
            {!! Form::label('','password') !!}
            {!! Form::password('password',['id'=>'','class'=>'','placeholder'=>'']) !!}
        </li>
        <li>
            {!! Form::label('','password confirm') !!}
            {!! Form::password('password_confirmation',['id'=>'','class'=>'','placeholder'=>'']) !!}
        </li>
        <li>
            {!! Form::label('','bio') !!}
            {!! Form::text('bio',$user->bio,['id'=>'','class'=>'','placeholder'=>'']) !!}
        </li>
        <li>
            {!! Form::label('','icon image') !!}
            {!! Form::file('images',['class'=>'']) !!}
        </li>
    </ul>
    </div>
</div>
<div class="mp_btn">{!! Form::submit('更新',['class'=>'btn btn-danger']) !!}</div>
    {!! Form::close() !!}
@endsection

@extends('layouts.logout')

@section('content')

{!! Form::open(['url'=>'/register']) !!}

<h2>新規ユーザー登録</h2>

<div class="error">
@foreach ($errors->all() as $error)
    <li>{{$error}}</li>
@endforeach
</div>

{{ Form::label('userName','user name',['class'=>'form_title']) }}
{{ Form::text('username',null,['id'=>'userName','class' => 'input form_inbox']) }}

{{ Form::label('mail','mail address',['class'=>'form_title']) }}
{{ Form::text('mail',null,['id'=>'mail','class' => 'input form_inbox']) }}

{{ Form::label('password','password',['class'=>'form_title']) }}
{{ Form::password('password',['id'=>'password','class' => 'input form_inbox']) }}

{{ Form::label('passwordConfirm','password confirm',['class'=>'form_title']) }}
{{ Form::password('password_confirmation',['id'=>'passwordConfirm','class' => 'input form_inbox']) }}

<div class="button">
    {{ Form::submit('REGISTER',['class'=>'btn btn-danger']) }}
</div>

<h3><a href="/login">ログイン画面へ戻る</a></h3>

{!! Form::close() !!}

@endsection

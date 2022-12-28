@extends('layouts.logout')

@section('content')

{!! Form::open() !!}

<h2>AtlasSNSへようこそ</h2>


{{ Form::label('mail address','mail address',['class'=>'form_title']) }}
{{ Form::text('mail',null,['id'=>'mailAdress','class' => 'input form_inbox']) }}

{{ Form::label('password','password',['class'=>'form_title']) }}
{{ Form::password('password',['id'=>'password','class' => 'input form_inbox']) }}

<div class="button">
    {{ Form::submit('LOGIN',['class'=>'btn btn-danger']) }}
</div>

<h4 class=""><a href="/register">新規ユーザーの方はこちら</a></h4>

{!! Form::close() !!}

@endsection

@extends('layouts.logout')

@section('content')


<h2><strong>{{ session('registered')}}さん</strong></h2>
<h4><strong>ようこそ！AtlasSNSへ！</strong></h4>

<h4 class="welcome-text">
    ユーザー登録が完了いたしました。<br>早速ログインをしてみましょう！
</h4>

<div class="center_button">
    <button class="btn btn-danger"><a href="/login">ログイン画面へ</a></button>
</div>

@endsection

@extends('layouts.login')

@section('content')

<!-- ***** 入力フォーム ***** -->
<div class="top_area d-flex">
    <div class="me-3">
        {!! Form::open(['url'=>'search']) !!}
        {!! Form::text('user_search',null,['class'=>'s_form','placeholder'=>'ユーザー名']) !!}
    </div>
    <div>
        <button type="submit" class="s_btn btn btn-primary">
            <i class="bi bi-search"></i>
        </button>
    </div>
        {!! Form::close() !!}
    <div class="m-auto">
        @if(!empty($keyword))
        <p class="session">検索ワード：{{ session('search') }}</p>
        @else
        <p hidden>検索ワードはありません</p>
        @endif
    </div>
</div>

<!-- ***** ユーザー一覧 ***** -->
@foreach ($users as $user)
<div class="us_list d-flex">
<tr>
    <td><div><image class="icon me-4" src="{{ '/storage/'.$user->images }}" alt="icon"></div></td>
    <td><div class="w-50">{{ $user->username }}</div></td>
    <td><div>
        @if(Auth()->user()->isfollowing($user->id))
        <button class=""><a class="btn btn-danger" href="/search/{{$user->id}}/unfollow"
        onclick="return confirm('{{$user->username}}さんのフォローを解除します。よろしいでしょうか？')">フォロー解除</a></button>
        @else
        <button class=""><a class="btn btn-info" href="/search/{{$user->id}}/follow">フォローする</a></button>
        @endif
    </div></td>
</tr>
</div>
    @endforeach



@endsection

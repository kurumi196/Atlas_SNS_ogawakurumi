@extends('layouts.login')

@section('content')

<!-- ********** header ********** -->
<div class="top_area d-flex">
    <div class="">
        <img class="icon" src="{{ '/storage/'.$user->images }}" alt="icon">
    </div>

    <div class="pr_contents w-100">
        <ul>
            <li class="mb-3">
                <label>name</label>
                <span class="">{{ $user->username }}</span>
            </li>
            <li>
                <label>bio</label>
                <span class="">{{ $user->bio }}</span>
            </li>
        </ul>
    </div>
    <div class="p_btn">
    @if(Auth()->user()->isfollowing($user->id))
    <button class=""><a class="btn btn-danger" href="/profile/{{$user->id}}/unfollow"
    onclick="return confirm('{{$user->username}}さんのフォローを解除します。よろしいでしょうか？')">フォロー解除</a></button>
    @else
    <button class=""><a class="btn btn-info" href="/profile/{{$user->id}}/follow">フォローする</a></button>
    @endif
    </div>
</div>

<!-- ********** posts ********** -->
<div class="index">
    @foreach ($posts as $post)
    <div class="p-3 d-flex post_list">
        <tr>
            <td><img class="icon ms-5 me-3" src="{{ '/storage/'.$post->user->images }}" alt="icon"></td>
            <td><div class="w-75">{{ $post->user->username }}<br></td>
            <td><pre class="mt-2">{{ $post->post }}</pre></div></td>
            <td><div class="small">{{ date('Y-m-d H:i',strtotime($post->created_at)) }}</div></td>
        </tr>
    </div>
    @endforeach
</div>

@endsection

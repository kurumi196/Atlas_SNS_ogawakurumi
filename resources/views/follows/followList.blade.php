@extends('layouts.login')

@section('content')

<!-- ********** フォローリスト　アイコン並べる ********** -->
<div class="top_area d-flex">
    <h4 class="">Follow List</h4>
    <div class="d-flex icon_list">
        @foreach($users as $user)
        <a class="" href="/profile/{{$user->id}}"><img class="icon" src="{{ '/storage/'.$user->images }}" alt="icon"></a>
        @endforeach
    </div>
</div>
<!-- ********** フォローしている人の投稿一覧 ********** -->
<div class="index">
    @foreach ($posts as $post)
    <div class="p-3 d-flex post_list">
        <tr>
            <td><a class="" href="/profile/{{$post->user->id}}"><img class="icon ms-5 me-3" src="{{ '/storage/'.$post->user->images }}" alt="icon"></a></td>
            <td><div class="w-75">{{ $post->user->username }}<br></td>
            <td><pre class="mt-2">{{ $post->post }}</pre></div></td>
            <td><div class="small">{{ date('Y-m-d H:i',strtotime($post->created_at)) }}</div></td>
        </tr>
    </div>
    @endforeach
</div>

@endsection

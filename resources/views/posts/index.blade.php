@extends('layouts.login')

@section('content')
<!-- ***** Post Form ***** -->
<div class="top_area">
    <ul  class="d-flex">
        <li><img class="icon me-3" src="{{ '/storage/'.Auth()->user()->images }}" alt="your-image"></li>
        <li class="w-100">
            {!! Form::open(['url'=>'post/create']) !!}
            {!! Form::textarea('newPost',null,['required','class'=>'form-control form_inbox','placeholder'=>'投稿内容を入力してください。','rows'=>'3']) !!}
        </li>
        <li><button class="icon" type="submit"><img  class="icon_b mt-5 mb-5" src="/images/post.png" alt="post_button"></button></li>
    </ul>
    {!! Form::close() !!}
</div>
<!-- ***** Post List ***** -->
<div class="index">
    @foreach ($posts as $post)
    <div class="p-3 d-flex post_list">
        <tr>
            <td><div><img class="icon ms-5 me-3" src="{{ '/storage/'.$post->user->images }}" alt="icon"></div></td>
            <td><div class="w-75">{{ $post->user->username }}<br></td>
            <td><pre class="mt-2">{{ $post->post }}</pre></div></td>
            <td>
                <div class="d-flex"><div class="post_date">{{ date('Y-m-d H:i',strtotime($post->created_at)) }}</div>
            </td>
            <td>
            @if($post->user_id==Auth()->id())
            <div class="post_btn">
                <button onclick="editModal({{$post->id}})">
                    <img class="icon" src="/images/edit.png" alt="edit_button">
                </button>
            </td>
            <td><a href="/post/{{$post->id}}/delete" onclick="return confirm('この投稿を削除します。よろしいでしょうか？')">
                    <img class="icon" src="/images/trash.png" alt="delete_button">
                </a>
            </div>
            @else
            <div hidden class="post_btn">
                <img class="icon" src="/images/edit.png" alt="edit_button">
                <img class="icon" src="/images/trash.png" alt="delete_button">
            </div>
            @endif
            </div>
            </td>
        </tr>
    </div>
<!-- ***** modal ***** -->
    <div class="edit_modal editModal_{{$post->id}}">
        <div class="modal_content">
            {!! Form::open(['url'=>'post/update','enctype'=>'multipart/form-data']) !!}
            {!! Form::hidden('id',$post->id) !!}
            {!! Form::textarea('upPost',$post->post,['required','class'=>'form-control','rows'=>'5']) !!}
            <div class="mt-3 me-3">
                <button type="submit" class=""><img class="icon" src="images/edit.png"></button>
            </div>
            {!! Form::close() !!}
        </div>
        <div class="modal_overlay" onclick="editModal({{ $post->id }})"></div>
    </div>
    @endforeach
</div>


@endsection

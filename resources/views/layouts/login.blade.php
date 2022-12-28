<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title>{{ Auth()->user()->username }}さんのSNS</title>
    <!-- ***** CSS -->
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->
</head>
<body>
    <header class=''>
        <div id="head">
            <ul>
                <li class="logo h-100">
                    <a href="/top">
                    <img class="h-100" src="/images/atlas.png" alt="logo">
                    </a>
                </li>
                <li class="">
                    <p class="text-white h_name"><strong>{{ Auth()->user()->username }}　さん</strong></p>
                </li>
                <li class="">
                    <button type="button" class="a_btn">
                    <span class="inn"></span>
                    </button>
                </li>
                <li>
                    <img class="icon" src="{{ '/storage/'.Auth()->user()->images }}" alt="your-image">
                </li>
                <li class="a_menu">
                    <nav class="a_nav">
                        <ul>
                            <li><a href="/top">HOME</a></li>
                            <li><a href="/myprofile">プロフィール編集</a></li>
                            <li><a href="/logout">ログアウト</a></li>
                        </ul>
                    </nav>
                </li>
            </ul>
        </div>
    </header>
    <div id="row" class="">
        <div id="container">
            @yield('content')
        </div >
        <div id="side-bar">
            <div id="confirm">
                <p class="mb-3">{{ Auth()->user()->username }}さんの</p>
                <div class="d-flex mt-2 mb-2">
                    <p>フォロー数</p>
                    <p class="sb_center">{{ \App\Follow::where('following_id',Auth()->id())->count() }}名</p>
                </div>
                <div class="right_button">
                    <button><a class="btn btn-primary" href="/follow-list">フォローリスト</a></button>
                </div>
                <div class="d-flex mt-2 mb-2">
                    <p>フォロワー数</p>
                    <p class="sb_center">{{ \App\Follow::where('followed_id',Auth()->id())->count() }}名</p>
                </div>
                <div  class="right_button">
                    <button><a class="btn btn-primary" href="/follower-list">フォロワーリスト</a></button>
                </div>
            </div>
            <div class="center_button sb_line">
                <button><a class="btn btn-primary" href="/search">ユーザー検索</a></button>
            </div>
        </div>
    </div>
    <footer>
    </footer>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>

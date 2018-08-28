<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>bbmedia works</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body class="index">

<div class="container">
    <h1 class="title">bbmedia works</h1>
    <div class="container__inner">
        <ul class="worksItems">
            @foreach($posts as $post)
                <li class="worksItem">
                    <a href="{{ action('PostsController@show', $post->id) }}">
                        {{--<p class="post_id">id{{ $post->id }}</p>--}}
                        <p class="post_release">release  {{ $post->release }}</p>
                        <p class="post_ttl">{{ $post->title }}</p>
                        <p class="post_thumb"><img src="/img/{{ $post->img }}" alt=""></p>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>

</body>
</html>



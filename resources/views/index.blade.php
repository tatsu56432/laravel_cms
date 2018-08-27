<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>bbmedia works</title>
</head>
<body>

<h1>bbmedia works</h1>

<div class="container">
    <div class="container__inner">
        <ul class="worksItems">
            @foreach($posts as $post)
                <li class="worksItem">
                    <a href="{{ action('PostsController@show', $post->id) }}">
                        <p class="post_id">{{ $post->id }}</p>
                        <p class="post_ttl">{{ $post->title }}</p>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>

</body>
</html>



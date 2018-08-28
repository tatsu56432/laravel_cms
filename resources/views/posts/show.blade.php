<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $post->title }}｜BBMEDIA</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body class="detail">
<div class="container">
    <div class="container__inner">
        <div class="contentsBox">
            <p class="thumb"><img src="/img/{{ $post->img }}" alt=""></p>
            <h1 class="ttl">{{ $post->title }}</h1>
            <p class="body">{{ $post->body }}</p>
        </div>
    </div>
</div>
</body>
</html>



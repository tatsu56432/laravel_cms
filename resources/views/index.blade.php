<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<?php

$data = "https://spreadsheets.google.com/feeds/list/1vrFsh5FId0LoYth5sMzCZbUCpn8duLBZVnpwadLPKLw/od6/public/values?alt=json";
$json = file_get_contents($data);
$json_decode = json_decode($json);


//echo "<pre>";
//var_dump($json_decode);
//echo "<pre>";

// jsonデータ内の『entry』部分を複数取得して、postsに格納
$posts = $json_decode->feed->entry;

// postsに格納したデータをループしつつ表示する
foreach ($posts as $post) {
    echo $post->{'gsx$title'}->{'$t'} . "<br>";
    echo $post->{'gsx$content'}->{'$t'}. "<br>";
    echo $post->{'gsx$status'}->{'$t'}. "<br>";
    echo $post->{'gsx$category'}->{'$t'}. "<br>";
    echo $post->{'gsx$release'}->{'$t'}. "<br>";
    echo "<br>";
    }
?>

</body>
</html>



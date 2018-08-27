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
$posts_data = array();


// jsonデータ内の『entry』部分を複数取得して、postsに格納
$posts = $json_decode->feed->entry;

// postsに格納したデータをループしつつ表示する
foreach ($posts as $post) {
    $posts_data[] = array(
        "title" =>  $post->{'gsx$title'}->{'$t'} ,
        "img" =>  $post->{'gsx$img'}->{'$t'} ,
        "contents" =>  $post->{'gsx$body'}->{'$t'},
        "status" =>  $post->{'gsx$status'}->{'$t'},
        "category" =>  $post->{'gsx$category'}->{'$t'},
        "release" =>  $post->{'gsx$release'}->{'$t'}
    );
}

echo "<pre>";
var_dump($posts_data);
echo "<pre>";

?>

</body>
</html>



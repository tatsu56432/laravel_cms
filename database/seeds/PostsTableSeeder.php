<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $posts_data = self::loadSpreadSheet();

        DB::table('posts')->insert($posts_data);

//        DB::table('posts')->insert([
//            [
//                'title' => '最初の記事',
//                'body' => '最初の記事のテキストです。',
//                'created_at' => '2017-05-02 14:28:19',
//                'updated_at' => '2017-05-02 14:28:19'
//            ],[
//                'title' => '2番目の記事',
//                'body' => '2番目の記事のテキストです。',
//                'created_at' => '2017-05-03 14:28:19',
//                'updated_at' => '2017-05-03 14:28:19'
//            ]
//        ]);
    }

    private function loadSpreadSheet()
    {
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
                "body" =>  $post->{'gsx$body'}->{'$t'},
                "status" =>  $post->{'gsx$status'}->{'$t'},
                "category" =>  $post->{'gsx$category'}->{'$t'},
                "release" =>  $post->{'gsx$release'}->{'$t'},
            );
        }


        return $posts_data;


    }
}

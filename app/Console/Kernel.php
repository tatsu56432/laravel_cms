<?php

namespace App\Console;

use DB;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();

        $schedule->call(function () {

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

            $tableRecord = DB::table('posts')->where('id', '=', '1')->get();
            if ( count($tableRecord) == 0 ){
                DB::table('posts')->insert($posts_data);
            }else{
                DB::table('posts')->truncate($posts_data);
                DB::table('posts')->insert($posts_data);
            }
        })->everyMinute();


//        $schedule->command('command:loadSpredSheet')->everyMinute();
//        $schedule->command('migrate:rollback')->everyMinute();
//        $schedule->command('migrate:refresh')->everyMinute();
//        $schedule->command('db:seed')->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}

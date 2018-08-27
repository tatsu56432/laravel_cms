<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class loadSpreadSheetCommand extends Command
{


    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:loadSpredSheet';



    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'do load spreadSheet ';


    protected $db_host;
    protected $db_user;
    protected $db_pass;
    protected $db_name;
    protected $store_path;
    protected $admin_user_mail_from;
    protected $admin_user_mail;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->db_host = env('DB_HOST');      // DBホスト
        $this->db_user = env('DB_USERNAME');  // DBユーザ
        $this->db_pass = env('DB_PASSWORD');  // DBパスワード
        $this->db_name = env('DB_DATABASE');  // バックアップ対象スキーマ

    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
    }
}

<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

// 追加
use App\Http\Controllers\Chart\TaskController;



class Task extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:task';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'タスクを更新するコマンド';
    
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        TaskController::data('work');
        TaskController::data('myself');
    }
}

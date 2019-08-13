<?php

namespace App\Console\Commands;

use App\Promotion;
use Illuminate\Console\Command;

class notifyPromotions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:notifyPromotions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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

        $promotions = Promotion::where('notify_me', 1)->get();

        $this->info($promotions);

    }
}

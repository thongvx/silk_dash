<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\TestController;

class RunTestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run the test function in TestController';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Gọi hàm test từ TestController
        $controller = new TestController();
        $controller->test();

        $this->info('Test function executed successfully!');

        return 0;
    }
}

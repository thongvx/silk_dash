<?php

namespace App\Http\Controllers\Dashboard;

use App\Jobs\CreateHlsJob;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Queue;

class TestController
{
    public function test()
    {
        Queue::push(new CreateHlsJob(123));

    }

}

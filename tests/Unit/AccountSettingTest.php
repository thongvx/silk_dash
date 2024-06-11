<?php

namespace Tests\Unit;

use App\Models\AccountSetting;
use App\Repositories\AccountRepo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\DB;
class AccountSettingTest extends TestCase
{


    protected AccountRepo $accountRepo;

    public function setUp(): void
    {
        parent::setUp();

        $this->accountRepo = $this->app->make(AccountRepo::class);
        DB::enableQueryLog();

    }
    public function testCreateAccountSetting()
    {
        $accountSetting = AccountSetting::factory()->create();
        var_dump($accountSetting->toArray());

        $this->assertDatabaseHas('account_settings', ['id' => $accountSetting->id]);
    }

    public function testUpdateAccountSetting()
    {
        $accountSetting = $this->accountRepo->getSetting(2);
        var_dump($accountSetting->logo);

        $accountSetting->update(['logo' => 'new_logo6.png']);

        var_dump($accountSetting->logo);
        $accountSetting = $this->accountRepo->getSetting(2);
        var_dump($accountSetting->logo);
        $this->assertDatabaseHas('account_settings', ['id' => $accountSetting->id, 'logo' => 'new_logo6.png']);
    }


    public function tearDown(): void
    {
        $queries = DB::getQueryLog();
        echo 'Số lượng query được thực hiện: ' . count($queries);
        var_dump($queries);
        parent::tearDown();
    }
}

<?php

namespace App\Console\Commands;

use App\Models\AccountSetting;
use App\Models\Folder;
use Illuminate\Console\Command;
use App\Models\User;
use Spatie\Permission\Models\Role;

class CreateAdminUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new user with admin role';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $name = $this->ask('What is the user\'s name?');
        $email = $this->ask('What is the user\'s email?');
        $password = $this->secret('What is the user\'s password?');

        $confirm = $this->confirm('Do you wish to continue with the provided information?', true);

        if ($confirm) {
            $user = new User();
            $user->name = $name;
            $user->email = $email;
            $user->password = bcrypt($password);
            $user->save();

            Folder::create([
                'user_id' => $user->id,
                'name_folder' => 'Single Video',
                'number_file' => 0,
                'soft_delete' => 0,
            ]);
            AccountSetting::create([
                'user_id' => $user->id,
                'earningModes' => 1,
                'videoType' => 1,
                'adblock' => 0,
                'showTitle' => 0,
                'logo' => '',
                'logoLink' => '',
                'position' => '',
                'poster' => '',
                'blockDirect' => 0,
                'domain' => '',
                'publicVideo' => 0,
                'premiumMode' => 0,
                'captionsMode' => 0,
                'disableDownload' => 0,
                'gridPoster' => 1,
            ]);

            // Check if the 'admin' role exists, if not, create it
            if (!Role::where('name', 'admin')->exists()) {
                Role::create(['name' => 'admin']);
            }

            // Assign the 'admin' role to the user
            $user->assignRole('admin');

            $this->info('Admin user created successfully.');
        } else {
            $this->info('Operation cancelled.');
        }

        return 0;
    }
}

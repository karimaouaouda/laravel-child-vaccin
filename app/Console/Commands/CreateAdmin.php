<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class CreateAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:admin {--verified}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->ask('what is the admin name ? :', 'salsabil boss');

        $email = $this->ask('what is the admin email ? : ', 'salsabilboss@gmail.com');

        $password = $this->ask('what is the admin password ? : ', 'vaccin1234');


        $user = User::create( compact('name', 'email', 'password') );

        $user->save();

        $user->role = 'admin';

        if( $this->hasOption('verified') ){
            $user->email_verified_at = now();
        }

        $user->save();


        $this->output->info('admin created successfully');
    }
}

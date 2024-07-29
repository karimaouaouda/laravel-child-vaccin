<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Notifications\TestMailer as NotificationsTestMailer;
use Filament\Notifications\Notification;
use Illuminate\Console\Command;

class TestMailer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:test-mailer';

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
        $user = User::find(1);

        $user->notify(new NotificationsTestMailer());

        $this->output->info('sdq');
    }
}

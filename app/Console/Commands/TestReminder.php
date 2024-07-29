<?php

namespace App\Console\Commands;

use App\Notifications\VaccinReminder;
use Filament\Support\Facades\FilamentIcon;
use Illuminate\Console\Command;
use Filament\Notifications\Notification;
use Illuminate\Notifications\Action;

class TestReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:test-reminder';

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
        $vaccins = \App\Models\Vaccin::all();
        $this->output->info('fail notifyed');

        foreach ($vaccins as $vaccin){
            $children = $vaccin->children;


            foreach ($children as $child){
                $this->output->info('fail notifyed');

                $date = new \Illuminate\Support\Carbon($child->pivot->vaccin_date);

                $now = now();

                $rest = $now->diff($date,false )->toDateInterval();


                if((!$rest->invert) && $rest->d <= 40){
                    $user = \App\Models\User::find( $child->owner_id );

                    //$user->notify(new \App\Notifications\VaccinReminder($child, $vaccin));

                    Notification::make()
                        ->title('child . '. $child->full_name. ' vaccin get sooner')
                        ->actions([
                            \Filament\Notifications\Actions\Action::make('url')
                                ->action(function() use ($child){
                                    return redirect()->to(url('/dashboard/children/'.$child->id.'/vaccins'));
                                })->label('details'),
                        ])
                        ->sendToDatabase($user);

                    $user->notify(
                        (new VaccinReminder($child, $vaccin))
                    );

                    $this->output->info('user notifyed');
                }

                $this->output->info('fail notifyed');

            }
        }
    }
}

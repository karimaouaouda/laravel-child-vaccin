<?php

use App\Notifications\VaccinReminder;
use Filament\Notifications\Notification;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Artisan::command('remind', function(){
    $vaccins = \App\Models\Vaccin::all();

    foreach ($vaccins as $vaccin){
        $children = $vaccin->children;

        foreach ($children as $child){

            $date = new \Illuminate\Support\Carbon($child->pivot->vaccin_date);

            $now = now();

            $rest = $now->diff($date,false )->toDateInterval();


            if((!$rest->invert) && $rest->d <= 7){
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

        }
    }
})->purpose('remind the parent of childs vaccins')->daily();

// 4 1

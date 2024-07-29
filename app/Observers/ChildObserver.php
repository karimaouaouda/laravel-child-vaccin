<?php

namespace App\Observers;

use App\Enum\AppointmentStatus;
use App\Models\Child;
use App\Models\User;
use App\Models\Vaccin;
use Filament\Facades\Filament;
use Filament\Notifications\Actions\Action;
use Filament\Notifications\Notification;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ChildObserver
{
    /**
     * Handle the Child "created" event.
     */
    public function created(Child $child): void
    {

        $vaccins = Vaccin::all();

        $wasted_vaccins = [];
        $fresh_vaccins  = [];
        $waited_vaccins = [];


        foreach ($vaccins as $vaccin){
            $age = $vaccin->age;
            $dob = new Carbon($child->date_of_birth);

            $child_age_in_months = $dob->diffInMonths(now());




            if(  ((int)$child_age_in_months) > $age ){
                $wasted_vaccins[] = $vaccin;
            }

            if( ((int)$child_age_in_months) <= $age){
                $waited_vaccins[] = $vaccin;
            }
        }

        $map = [];
        $dates = [];
        //fill the waited vaccins
        foreach($waited_vaccins as $vaccin){
            $map[$vaccin->id] = 0;
            $age = $vaccin->age;
            $dob = new Carbon($child->date_of_birth);
            $vaccin_date = $dob->addMonths($age);

            if($age > 0){
                $vaccin_date->setHour(8);
                $vaccin_date->setMinute(0);
                $vaccin_date->setSecond(0);
            }else{
                $vaccin_date->addMinutes(15);
            }

            DB::table('vaccin_appointments')
                ->insert([
                    'child_id' => $child->id,
                    'vaccin_id' => $vaccin->id,
                    'vaccin_date' => $vaccin_date,
                    'status' => AppointmentStatus::WAITING->value
                ]);

            $dates[$vaccin->id] = $vaccin_date;


        }
        foreach($fresh_vaccins as $vaccin){

            if( now()->hours > 20 ){
                $vaccin_date = now()->addDays(1);
                $vaccin_date->setHour(8);
                $vaccin_date->setMinute(0);
                $vaccin_date->setSecond(0);
            }else{
                $vaccin_date = now()->addHours(2);
            }

            DB::table('vaccin_appointments')
                ->insert([
                    'child_id' => $child->id,
                    'vaccin_id' => $vaccin->id,
                    'vaccin_date' => $vaccin_date,
                    'status' => AppointmentStatus::WAITING->value
                ]);
        }

        if(count($waited_vaccins) > 0){
            $keys = [];
            foreach($wasted_vaccins as $vaccin){

                $key = $this->getMinValue($map);
                $map[$key] = $map[$key] + 1;

                DB::table('vaccin_appointments')
                    ->insert([
                        'child_id' => $child->id,
                        'vaccin_id' => $vaccin->id,
                        'vaccin_date' => $dates[$key],
                        'with_appointment' => DB::table('vaccin_appointments')->where('vaccin_id', '=', $key)->get()->first()->id,
                        'status' => AppointmentStatus::WASTED->value
                    ]);
            }
        }


        $user = User::find($child->owner_id);

        Notification::make()
            ->title('child ' . $child->full_name . ' created successfully')
            ->sendToDatabase($user);

        $this->sendNotificationsAboutWastedVaccins($wasted_vaccins, $user, $child);

        //$user->notify(new ChildCreated($child));


    }


    private function sendNotificationsAboutWastedVaccins(array $wasted = [],User $user, $child){
        if( $wasted == [] )
            return null;

        foreach($wasted as $vaccin){
            Notification::make()
                ->title('you waste a vaccin ! or do you do it?')
                ->actions([
                    Action::make('see it')
                        ->label('see it')
                        ->color("success")
                        ->url('/dashboard/children/' . $child->id . '/vaccins/?tableSearch=' . $vaccin->name ),
                ])
                ->sendToDatabase($user);
        }
    }


    private function getMinValue($arr = []){


        if($arr == [])
            return null;

        $min = PHP_INT_MAX;
        $k = -1;
        foreach($arr as $key => $value){
            if( $value < $min ){
                $k = $key;
                $min = $value;
            }
        }

        return $k;
    }

    /**
     * Handle the Child "updated" event.
     */
    public function updated(Child $child): void
    {
        Notification::make()
            ->title('child updated successfully')
            ->sendToDatabase(User::find($child->owner_id));
    }

    /**
     * Handle the Child "deleted" event.
     */
    public function deleted(Child $child): void
    {
        //
    }

    /**
     * Handle the Child "restored" event.
     */
    public function restored(Child $child): void
    {
        //
    }

    /**
     * Handle the Child "force deleted" event.
     */
    public function forceDeleted(Child $child): void
    {
        //
    }
}

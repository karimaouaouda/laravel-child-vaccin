<?php

namespace App\Observers;

use App\Models\Owner;
use App\Models\User;
use App\Notifications\Greeting;
use Filament\Notifications\Notification;

class UserObserver
{
    /**
     * Handle the User "created" event.
     */
    public function created(User $user): void
    {
        Owner::create([
            'user_id' => $user->id
        ])->save();

       $user->notify(
        new Greeting($user)
       );

       Notification::make()
        ->title("hello to our application")
        ->sendToDatabase($user);
    }

    /**
     * Handle the User "updated" event.
     */
    public function updated(User $user): void
    {
        //
    }

    /**
     * Handle the User "deleted" event.
     */
    public function deleted(User $user): void
    {
        //
    }

    /**
     * Handle the User "restored" event.
     */
    public function restored(User $user): void
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(User $user): void
    {
        //
    }
}

<?php

namespace App\Notifications;

use App\Models\Child;
use App\Models\Vaccin;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class VaccinReminder extends Notification
{
    use Queueable;

    public $message_details = "";


    public function __invoke()
    {
        // TODO: Implement __invoke() method.
    }

    /**
     * Create a new notification instance.
     * @param Child $child the child to give vaccin
     * @param Vaccin $vaccin the vaccin type
     */
    public function __construct(public Child $child,public Vaccin $vaccin)
    {
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('your child ' . $this->child->full_name . ' vaccin is get sooner')
                    ->action('see details', url('/dashboard/children/' . $this->child->id . '/vaccins'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'child_id' => $this->child->id,
            'vaccin' => $this->vaccin->id
        ];
    }
}

<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ApplySpeakerNotification extends Notification
{
    use Queueable;
    public $apply_speaker;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($apply_speaker)
    {
        $this->apply_speaker=$apply_speaker;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }


    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'name'=>$this->apply_speaker->name,
            'surname'=>$this->apply_speaker->surname,
        ];
    }
}

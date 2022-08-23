<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CouponNotification extends Notification
{
    use Queueable;
    public  $coupon;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($coupon)
    {
        $this->coupon=$coupon;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('Hi Dear `')
            ->line($this->coupon->user)
            ->line('You have a coupon')
            ->view('email.coupon',['coupon'=>$this->coupon]);
    }

}

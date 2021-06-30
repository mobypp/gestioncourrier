<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class FinishCourrier extends Notification
{
    use Queueable;

    public $courrier;


    public function __construct($courrier)
    {
        $this->courrier = $courrier;
    }


    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'courrier_id' => $this->courrier->id,
        ];
    }
}

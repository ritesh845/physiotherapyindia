<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NotifyMessage extends Notification
{
    use Queueable;
    public $data;
   
    public function __construct($data)
    {
        $this->data = $data;
    }

   
    public function via($notifiable)
    {
        return ['database'];
    }

    
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    
    public function toArray($notifiable)
    {
        return [
            'id'        => $this->data['id'],
            'title'     => $this->data['title'],
            'message'   => $this->data['message'],
            'link'      => $this->data['link'],
        ];
    }

   
}

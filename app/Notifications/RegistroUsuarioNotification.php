<?php

namespace App\Notifications;

use App\Mail\RegistrationMail; 
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use App\Models\User;

class RegistroUsuarioNotification extends Notification
{
    use Queueable;

    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user; 
    }

    public function via($notifiable)
    {
        return ['mail']; 
    }

    public function toMail($notifiable)
    {
        return (new RegistrationMail($this->user))->to($this->user->email);
    }

    public function toArray($notifiable)
    {
        return [];
    }
}

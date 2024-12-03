<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PrestamoNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    protected $detalles;
    public function __construct($detalles)
    {
        $this->detalles = $detalles;
    }
    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Préstamo Registrado')
            ->greeting('¡Hola ' . $this->detalles['nombreUsuario'] . '!')
            ->line('Se ha registrado un préstamo a tu nombre.')
            ->line('**Material:** ' . $this->detalles['material'])
            ->line('**Cantidad:** ' . $this->detalles['cantidad'])
            ->line('**Fecha de Préstamo:** ' . $this->detalles['fechaPrestamo'])
            ->line('**Fecha de Devolución:** ' . $this->detalles['fechaDevolucion'])
            ->line('Por favor, recuerda devolver el material a tiempo.')
            ->action('Ir al Sistema', url('/'))
            ->line('Gracias por usar nuestro sistema.');
    }
    

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    

    /**
     * Get the mail representation of the notification.
     */
    

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}

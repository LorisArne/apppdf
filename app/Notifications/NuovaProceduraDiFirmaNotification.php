<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NuovaProceduraDiFirmaNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct($procedura, $nFirma)
    {
        $this->procedura = $procedura;
        $this->nFirma = $nFirma+1;
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
            ->subject('Firma il documento')
            ->greeting('Salve '.$notifiable->name)
            ->line('Firma il documento.')
            ->action('Scarica il documento', url('/proceduras/'.$this->nFirma.'/' . $this->procedura->id."/firma"))
            ->line('Grazie!');
    }

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

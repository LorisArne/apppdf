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
        $this->nFirma = $nFirma;
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
            ->subject('Firma il documento '.$this->procedura->nome_procedura)
            ->greeting('Buongiorno, '.$notifiable->name)
            ->line('Chiediamo cortesemente di firmare il documento '.$this->procedura->nome_procedura.' al link indicato' )
            ->action('Scarica il documento', url('/proceduras/'.$this->nFirma.'/' . $this->procedura->id."/firma"))
            ->line('Grazie')
            ->line('Staff Studi GL');
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

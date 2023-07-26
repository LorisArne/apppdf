<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NuovaProceduraDiFirmaNotificationAdmin extends Notification
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
        $nFirma = $this->nFirma;
        $nFirma = $nFirma -1;
        return (new MailMessage)
            ->subject('Procedura di firma portata a termine!')
            ->greeting('Salve '.$notifiable->name)
            ->line('La procedura di firma "'.$this->procedura->nome_procedura.'" è stata portata a termine con la firma numero '.$nFirma)
            ->action('Scarica il documento', url('/proceduras/' . $this->procedura->id."/edit"))
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

<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class FinishTrip extends Notification
{
    use Queueable;
    private $meeting;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Meeting $meeting)
    {
        $this->meeting = $meeting;
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
                ->subject('Viagem Cancelada')
                ->greeting('Olá ,'. $this->meeting->User->Profile->name. ' '. $this->meeting->User->Profile->last_name)
                ->line('A viagem realizada por '. $this->meeting->Trip->User->Profile->name.' '.$this->meeting->Trip->User->Profile->last_name.' foi finalizada.')
                ->line('Detalhes da viagem: '.with(new \DateTime($this->meeting->Trip->date))->format('d/m/Y').' às : '. $this->meeting->Trip->time)
                ->line('Saindo de : '.$this->meeting->Trip->exit_address)
                ->line('Indo para : '.$this->meeting->Trip->arrival_address)
                ->line('Se você participou desta viagem não deixe de avaliar o MOTORISTA!!')
                ->action('Avaliar', url('/'))
                ->line('Obrigado por usar nosso aplicativo!');
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
            //
        ];
    }
}

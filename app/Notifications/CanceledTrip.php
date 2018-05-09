<?php

namespace App\Notifications;

use App\Domains\Meeting;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class CanceledTrip extends Notification
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
                    ->greeting('Ol� ,'. $this->meeting->User->Profile->name. ' '. $this->meeting->User->Profile->last_name)
                    ->line('lamentamos informar, por�m a sua viagem realizada por '. $this->meeting->Trip->User->Profile->name.' '.$this->meeting->Trip->User->Profile->last_name.' foi cancelada.')
                    ->line('Detalhes da viagem')
                    ->line('Data -'. $this->meeting->Trip->date. ' Hora - '. $this->meeting->Trip->time)
                    ->action('Ver Viagem', url('/user/trip/'.$this->meeting->Trip->id.'/show'))
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

<?php

namespace App\Notifications;

use App\Domains\Meeting;
use App\Domains\Trip;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class CreateMeeting extends Notification
{
    use Queueable;

    protected $meeting;

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
                    ->subject('Alguém quer uma carona')
                    ->greeting('Olá '.$this->meeting->Trip->User->Profile->name.' '.$this->meeting->Trip->User->Profile->last_name)
                    ->line('Alguém quer pegar carona com você!!')
                    ->line('Referente a sua viagem no dia '.with(new \DateTime($this->meeting->Trip->date))->format('d/m/Y').' às : '. $this->meeting->Trip->time)
                    ->line('Saindo de : '.$this->meeting->Trip->exit_address)
                    ->line('Indo para : '.$this->meeting->Trip->arrival_address)
                    ->action('Ver Viagem', url('/user/trip/'.$this->meeting->Trip->id.'/show'))
                    ->line('Obrigado por usar nosso aplicativo');
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

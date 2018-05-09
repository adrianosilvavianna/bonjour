<?php

namespace App\Notifications;

use App\Domains\Trip;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class CancelMeeting extends Notification
{
    use Queueable;

    private $trip;
    private $user;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Trip $trip, User $user)
    {
        $this->trip = $trip;
        $this->user = $user;
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
                    ->subject('Carona Cancelada')
                    ->greeting('Olá '.$this->trip->User->Profile->name.' '.$this->trip->User->Profile->last_name)
                    ->line($this->user->Profile->name.' '.$this->user->Profile->name.' Não pegará mais carona com você')
                    ->line('Não fique triste pois logo logo outras pessoas terão interesse em sua viagem.')
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

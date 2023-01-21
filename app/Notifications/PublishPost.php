<?php

namespace App\Notifications;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\DatabaseMessage;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Auth;
use App\models\User;

class PublishPost extends Notification
{
    use Queueable;

    public $artikel;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($artikel)
    {
        $this->artikel = $artikel;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database','broadcast'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toDatabase($notifiable)
    {
        return[
           'message' => Auth::user()->username.' mempublikasikan artikel anda '.$this->artikel->judul_artikel,
           'foto_admin' => asset(Auth::user()->image),
           'foto_artikel' => asset($this->artikel->foto_artikel),
           'action' => $this->artikel->slug
        ];
    }

    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
           'message' => Auth::user()->username.' membuat artikel '.$this->artikel->judul_artikel,
           'foto_admin' => asset(Auth::user()->image),
           'foto_artikel' => asset($this->artikel->foto_artikel),
           'action' => $this->artikel->slug
        ]);
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

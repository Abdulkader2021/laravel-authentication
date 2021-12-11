<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\URL;

class EmailVerificationNotification extends Notification
{
    use Queueable;

   public $user;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user = '')
    {
        $this->user = $user ?: Auth::user();
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
        $actionUrl = $this->verificationUrl($notifiable);

        return (new MailMessage)
                    ->subject('Verify your account')
                    ->view('emails.emailVerify',
                        [
                            'user' => $this->user,
                            'actionUrl' => $actionUrl
                        ]
                    );
    }

    /**
     * Get Verification URL for the given notification
     * @param  mixed  $notifiable
     * @return array
     */

    protected function verificationUrl($notifiable){

        return URL::temporarySignedRoute(
            'verification.verify',
            Carbon::now()->addMinutes(Config::get('auth.verification.expire', 60)),
            [
                'id' => $notifiable->getKey(),
                'hash' => sha1($notifiable->getEmailForVerification())
            ]
        );

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

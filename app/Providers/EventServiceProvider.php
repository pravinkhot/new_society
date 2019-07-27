<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\URL;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        Illuminate\Auth\Events\Verified::class => [
            App\Listeners\LogVerifiedUser::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        \Illuminate\Auth\Notifications\VerifyEmail::toMailUsing(function ($notifiable) {
            return (new \Illuminate\Notifications\Messages\MailMessage)
            ->subject('Verify Email Address')
            ->view(
                'emails.verify_account', [
                    'verificationUrl' => $this->verificationUrl($notifiable),
                    'userDetails' => $notifiable
                ]
            );
        });
    }

    /**
     * Get the verification URL for the given notifiable.
     *
     * @param  mixed  $notifiable
     * @return string
     */
    protected function verificationUrl($notifiable)
    {
        return URL::temporarySignedRoute(
            'verification.verify',
            Carbon::now()->addMinutes(Config::get('auth.verification.expire', 60)),
            [
                'id' => $notifiable->getKey()
            ]
        );
    }
}

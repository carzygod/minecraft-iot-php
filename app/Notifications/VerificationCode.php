<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Leonis\Notifications\EasySms\Channels\EasySmsChannel;
use Leonis\Notifications\EasySms\Messages\EasySmsMessage;

class VerificationCode extends Notification
{
    use Queueable;

    private $code;

    /**
     * VerificationCode constructor.
     *
     * @param int $code
     */
    public function __construct(int $code)
    {
        $this->code = $code;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     *
     * @return array
     */
    public function via($notifiable): array
    {
        return [EasySmsChannel::class];
    }

    /**
     * Get the sms representation of the notification.
     *
     * @param mixed $notifiable
     *
     * @return EasySmsMessage
     */
    public function toEasySms($notifiable): EasySmsMessage
    {
        return (new EasySmsMessage)
            ->setTemplate('SMS_203670199')
            ->setData(['code' => $this->code]);
    }
}

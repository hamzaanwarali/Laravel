<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewRewardRequestNotification extends Notification
{
    use Queueable;

    public $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function via($notifiable)
    {
        return ['database']; // إرسال عبر قاعدة البيانات فقط
    }

    public function toDatabase($notifiable)
    {
        return [
            'title' => 'طلب مكافأة جديد',
            'message' => 'تم تقديم طلب جديد للمكافأة: '.$this->request->reward->name,
            'link' => '/admin/requests/'.$this->request->id,
            'request_id' => $this->request->id
        ];
    }
}

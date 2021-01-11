<?php

namespace App\Notifications\Refund;

use App\Refund;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class Declined extends Notification implements ShouldQueue
{
    use Queueable;

    public $refund;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Refund $refund)
    {
        $this->refund = $refund;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        if($this->refund->order->customer_id)
            return ['mail', 'database'];

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
        ->from(get_sender_email($this->refund->shop_id), get_sender_name($this->refund->shop_id))
        ->subject( trans('notifications.refund_declined.subject', ['order' => $this->refund->order->order_number]) )
        ->markdown('admin.mail.refund.declined', ['refund' => $this->refund]);
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
            'order' => $this->refund->order->order_number,
            'status' => $this->refund->statusName(),
            'amount' => $this->refund->amount,
        ];
    }
}

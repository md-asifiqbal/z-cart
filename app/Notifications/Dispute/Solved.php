<?php

namespace App\Notifications\Dispute;

use App\Dispute;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class Solved extends Notification implements ShouldQueue
{
    use Queueable;

    public $dispute;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Dispute $dispute)
    {
        $this->dispute = $dispute;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
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
        ->subject( trans('notifications.dispute_solved.subject', ['order_id' => $this->dispute->order->order_number]) )
        ->markdown('admin.mail.dispute.solved', ['url' => route('admin.support.dispute.show', $this->dispute->id), 'dispute' => $this->dispute]);
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
            'id' => $this->dispute->id,
            'status' => $this->dispute->statusName(),
            'customer' => $this->dispute->customer->getName(),
            'category' => $this->dispute->dispute_type->detail,
            'order_number' => $this->dispute->order->order_number,
        ];
    }
}
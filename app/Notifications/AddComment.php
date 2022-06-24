<?php

namespace App\Notifications;

use App\Models\Comment\Comment;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AddComment extends Notification
{
    use Queueable;
    private $comment;
    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }
    public function via($notifiable)
    {
        return ['database'];
    }
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
    public function toDatabase($notifiable)
    {
        return [
            'id' => $this->comment->id,
            'comment' => $this->comment->comment,
        ];
    }
}

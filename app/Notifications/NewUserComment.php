<?php

namespace App\Notifications;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewUserComment extends Notification
{
    use Queueable;
    public $comment;
    public function __construct($comment)
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
                    ->greeting('Hello, Admin!')
                    ->subject('New Comment') 
                    ->line('New Comment by' .$this->comment->post->title)
                    ->line('The comment click view button')
                    ->action('View', url(route('posts.show',$this->comment->post->id)))
                    ->line('Thank you for using our application!');
    }
    public function toArray($notifiable)
    {
        return [
            'comment' => $this->comment->comment,
            'title' => $this->comment->post->title,
            'time' => Carbon::now()->diffForHumans(),
        ];
    }
}

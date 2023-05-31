<?php

namespace App\Notifications;

use App\Models\Article;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use NotificationChannels\Telegram\TelegramMessage;

class TelegramNotification extends Notification
{
    use Queueable;

    /**
     * @var Article
     */
    private Article $article;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(
        Article $article
    ) {
        $this->article = $article;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['telegram'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toTelegram($notifiable)
    {
        return TelegramMessage::create()
            ->to($notifiable)
            ->content("A new article has been created: [" . $this->article->title . "](" . route('article.show', $this->article->id) . ")");
    }
}

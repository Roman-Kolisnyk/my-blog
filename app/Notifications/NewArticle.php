<?php

namespace App\Notifications;

use App\Models\Article;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewArticle extends Notification
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
    public function via($notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable): array
    {
        return [
            'article_name' => $this->article->title,
            'article_link' => route('article.show', $this->article->id)
        ];
    }
}

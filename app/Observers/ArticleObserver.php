<?php

namespace App\Observers;

use App\Mail\ArticleRemoved;
use App\Models\Article;
use App\Models\TelegramChat;
use App\Models\User;
use App\Notifications\NewArticle;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class ArticleObserver
{
    /**
     * Handle the Article "created" event.
     *
     * @param \App\Models\Article $article
     * @return void
     */
    public function created(Article $article): void
    {
        $admins = User::getAdmins();
        $telegramChatIds = TelegramChat::all()->pluck('message_chat_id');

        Notification::send($admins, new NewArticle($article));
        Notification::send($telegramChatIds, new \App\Notifications\TelegramNotification($article));
    }

    /**
     * Handle the Article "deleted" event.
     *
     * @param \App\Models\Article $article
     * @return void
     */
    public function deleted(Article $article): void
    {
        $admins = User::getAdmins();

        Mail::to($admins)->send(new ArticleRemoved($article));
    }
}

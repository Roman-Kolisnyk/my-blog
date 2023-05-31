<?php

namespace App\Mail;

use App\Models\Article;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ArticleRemoved extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var Article
     */
    private Article $article;

    /**
     * Create a new message instance.
     *
     * @param Article $article
     */
    public function __construct(
        Article $article
    ) {
        $this->article = $article;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            from: new Address('secret@src.com', 'Jeffrey Way'),
            subject: 'Blog\'s Article was removed'
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'emails.article.removed',
            with: [
                'articleTitle' => $this->article->title
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}

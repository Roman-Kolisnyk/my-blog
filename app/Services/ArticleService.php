<?php

namespace App\Services;

use App\Models\Article;

class ArticleService
{
    /**
     * @param array $data
     * @return Article
     */
    public function store(array $data): Article
    {
        $tags = $this->extractTags($data);

        $this->imageHandler($data);

        $article = Article::create($data);

        $article->tags()->attach($tags);

        return $article;
    }

    /**
     * @param Article $article
     * @param array $data
     * @return Article
     */
    public function update(Article $article, array $data): Article
    {
        $tags = $this->extractTags($data);

        $this->imageHandler($data);

        $article->update($data);

        $article->refresh();
        $article->tags()->sync($tags);

        return $article;
    }

    /**
     * @param array $data
     * @return void
     */
    private function imageHandler(array &$data): void
    {
        if (isset($data['image'])) {
            $imageName = $this->saveArticleImageToStorage($data);
            $data['image'] = $imageName;
        }
    }

    /**
     * @param array $data
     * @return string
     */
    private function saveArticleImageToStorage(array $data): string
    {
        $imageName = $data['image']->getClientOriginalName();
        request()->file('image')?->storeAs('public/images/article_images', $imageName);

        return $imageName;
    }

    /**
     * @param array $data
     * @return array
     */
    private function extractTags(array &$data): array
    {
        $tags = $data['tags'];
        unset($data['tags']);

        return $tags;
    }
}

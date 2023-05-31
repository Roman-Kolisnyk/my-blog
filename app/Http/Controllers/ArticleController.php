<?php

namespace App\Http\Controllers;

use App\Events\ArticleCreated;
use App\Http\Requests\Article\StoreRequest;
use App\Http\Requests\Article\UpdateRequest;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use App\Services\ArticleService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ArticleController extends Controller
{
    /**
     * @param ArticleService $articleService
     */
    public function __construct(
        private readonly ArticleService $articleService
    ) {
        $this->middleware('role:admin')->except(['show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $articles = Article::with(['category', 'tags'])->paginate(12);

        return view('article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('article.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRequest $request
     * @return RedirectResponse
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $newArticle = $this->articleService->store($data);

        return redirect()->route('article.show', $newArticle->id);
    }

    /**
     * Display the specified resource.
     *
     * @param Article $article
     * @return Application|Factory|View
     */
    public function show(Article $article)
    {
        return view('article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Article $article
     * @return Application|Factory|View
     */
    public function edit(Article $article)
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('article.edit', compact('article', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param Article $article
     * @return RedirectResponse
     */
    public function update(UpdateRequest $request, Article $article): RedirectResponse
    {
        $data = $request->validated();

        $updatedArticle = $this->articleService->update($article, $data);

        return redirect()->route('article.show', $updatedArticle->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Article $article
     * @return RedirectResponse
     */
    public function destroy(Article $article): RedirectResponse
    {
        $article->delete();

        return redirect()->route('home.index');
    }
}

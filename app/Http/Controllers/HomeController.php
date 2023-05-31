<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $articles = Article::with(['category', 'tags'])
            ->orderBy('id', 'desc')
            ->paginate(5);

        return view('home.index', compact('articles'));
    }
}

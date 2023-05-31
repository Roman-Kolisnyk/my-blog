<?php

use App\Http\Controllers\{
    ArticleController,
    HomeController,
    ProfileController,
    DashboardController,
    TelegramController
};
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::redirect('/', '/home');

Route::get('/home', [HomeController::class, 'index'])->name('home.index');

Route::resource('articles', ArticleController::class)->names([
    'index' => 'article.index',
    'create' => 'article.create',
    'store' => 'article.store',
    'show' => 'article.show',
    'edit' => 'article.edit',
    'update' => 'article.update',
    'destroy' => 'article.destroy'
]);

Route::resource('categories', \App\Http\Controllers\CategoryController::class)
    ->except('show')
    ->middleware('role:admin')
    ->names([
    'index' => 'category.index',
    'create' => 'category.create',
    'store' => 'category.store',
    'edit' => 'category.edit',
    'update' => 'category.update',
    'destroy' => 'category.destroy',
]);
Route::get('/my-page', 'FirstPageController@view');
Route::resource('tags', \App\Http\Controllers\TagController::class)
    ->except('show')
    ->middleware('role:admin')
    ->names([
    'index' => 'tag.index',
    'create' => 'tag.create',
    'store' => 'tag.store',
    'edit' => 'tag.edit',
    'update' => 'tag.update',
    'destroy' => 'tag.destroy',
]);

Route::view('/about-us', 'about')->name('about.index');

Auth::routes();

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::post('/dashboard', [DashboardController::class, 'markArticle'])->middleware(['auth', 'verified'])->name('dashboard.mark_article');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Auth::routes();

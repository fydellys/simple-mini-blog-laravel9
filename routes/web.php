<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Public\PublicController;
use App\Http\Controllers\SettingsController;
use App\Models\Admin\Post;
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



Route::middleware(['auth'])->group(function() {
    // Home
    Route::get('/admin', function () { $data = Post::all(); return view('admin.dashboard', compact('data')); })->name('admin.dashboard');
    Route::get('/admin/dashboard', function () { $data = Post::all(); return view('admin.dashboard', compact('data')); })->name('admin.dashboard');
    // Configs User
    Route::get('/admin/user', [UserController::class, 'index'])->name('admin.user.index');
    Route::post('/admin/user/update', [UserController::class, 'update'])->name('admin.user.update');
    // Configs Company
    Route::get('/admin/settings', [SettingsController::class, 'index'])->name('admin.settings.index');
    Route::post('/admin/settings/update', [SettingsController::class, 'update'])->name('admin.settings.update');
    // Posts
    Route::get('/admin/post', [PostController::class, 'index'])->name('admin.post.index');
    Route::get('/admin/post/create', [PostController::class, 'store'])->name('admin.post.store');
    Route::post('/admin/post/create', [PostController::class, 'store'])->name('admin.post.store');
    Route::get('/admin/post/edit/{id}', [PostController::class, 'edit'])->name('admin.post.edit');
    Route::post('/admin/post/update/{id}', [PostController::class, 'update'])->name('admin.post.update');
    Route::post('/admin/post/destroy/{id}', [PostController::class, 'destroy'])->name('admin.post.destroy');
    // Categorys
    Route::get('/admin/category', [CategoryController::class, 'index'])->name('admin.category.index');
    Route::get('/admin/category/create', [CategoryController::class, 'store'])->name('admin.category.store');
    Route::post('/admin/category/create', [CategoryController::class, 'store'])->name('admin.category.store');
    Route::get('/admin/category/edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
    Route::post('/admin/category/update/{id}', [CategoryController::class, 'update'])->name('admin.category.update');
    Route::post('/admin/category/destroy/{id}', [CategoryController::class, 'destroy'])->name('admin.category.destroy');
});

Route::get('/', [PublicController::class, 'index'])->name('public.index');
Route::get('/post/{slug}', [PublicController::class, 'post'])->name('public.post');
Route::get('/blog', [PublicController::class, 'blog'])->name('public.blog');
Route::get('/categories', [PublicController::class, 'categories'])->name('public.categories');
Route::get('/category/{name}', [PublicController::class, 'category'])->name('public.category');

require __DIR__.'/auth.php';

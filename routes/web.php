<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ProjectController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/projects', [ProjectController::class, 'index'])->name('projects');
Route::get('/projects/{slug}', [ProjectController::class, 'show'])->name('projects.show');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard/blog',[DashboardController::class, 'blog'])->name('dashboard.blog');
    Route::get('/dashboard/blog/{post}',[BlogController::class, 'edit'])->name('dashboard.blog.edit');
    Route::post('/dashboard/blog/{post}',[BlogController::class, 'update'])->name('dashboard.blog.update');
    Route::delete('/dashboard/blog/{post}',[BlogController::class, 'destroy'])->name('dashboard.blog.destroy');
    Route::get('/dashboard/new-post',[BlogController::class, 'create'])->name('dashboard.blog.new');
    Route::post('/dashboard/new-post',[BlogController::class, 'store'])->name('dashboard.blog.store');


    Route::get('/dashboard/projects',[DashboardController::class, 'projects'])->name('dashboard.projects');
    Route::get('/dashboard/projects/{project}',[ProjectController::class, 'edit'])->name('dashboard.projects.edit');
    Route::post('/dashboard/projects/{project}',[ProjectController::class, 'update'])->name('dashboard.projects.update');
    Route::delete('/dashboard/projects/{project}',[ProjectController::class, 'destroy'])->name('dashboard.projects.destroy');
    Route::get('/dashboard/new-project',[ProjectController::class, 'create'])->name('dashboard.projects.new');
    Route::post('/dashboard/new-project',[ProjectController::class, 'store'])->name('dashboard.projects.store');

    Route::get('/dashboard/images', [ImageController::class, 'index'])->name('dashboard.images');
    Route::post('/dashboard/images', [ImageController::class, 'store'])->name('dashboard.images.store');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

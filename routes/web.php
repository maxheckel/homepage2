<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\DashboardController;
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


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard/blog', [DashboardController::class, 'blog'])->name('dashboard.blog');
    Route::get('/dashboard/projects',[DashboardController::class, 'projects'])->name('dashboard.projects');
    Route::get('/dashboard/projects/new',[ProjectController::class, 'create'])->name('dashboard.projects.new');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

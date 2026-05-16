<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Front\CategoryController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\LiveStatsController;
use App\Http\Controllers\SpotifyController;
use Illuminate\Support\Facades\Route;


Route::get('/', [FrontController::class, 'index'])->name('index');

Route::get('/live/visitors',     [LiveStatsController::class, 'visitors'])->name('live.visitors');
Route::get('/live/github-stats', [LiveStatsController::class, 'githubStats'])->name('live.github');
Route::get('/live/now-playing',  [SpotifyController::class, 'nowPlaying'])->name('live.spotify');
// Search-live
Route::get('team-members/{slug}', [FrontController::class, 'teamDetail'])->name('team.detail');
Route::post('message', [FrontController::class, 'messageSave'])->name('message.store');
Route::get('album-images/{album}',[FrontController::class,'imageDetail'])->name('image');
Route::get('service-detail/{album}',[FrontController::class,'serviceDetail'])->name('service.detail');

Route::get('blogs/load-more', [FrontController::class, 'blogsLoadMore'])->name('blogs.load-more');
// Route::get('blogs/{slug}',[FrontController::class,'blogDetail'])->name('blogs');
Route::get('{slug}', [FrontController::class, 'blogDetail'])->name('blogs');


Route::get('content-view/{content}', [CategoryController::class, 'page'])->name('page');
Route::get('{category}', [CategoryController::class, 'category'])->name('category');
Route::post('subscribe/email', [FrontController::class, 'subscribe'])->name('subscribe');
Route::post('chat', [ChatController::class, 'send'])->name('chat.send')->middleware('throttle:chat');

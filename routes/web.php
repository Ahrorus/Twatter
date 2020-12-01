<?php

use App\Http\Controllers\TweetLikeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TweetController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FollowsController;
use App\Http\Controllers\ExploreController;

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
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/home',
        [TweetController::class, 'index'])->name('home');
    Route::get('/tweets',
        [TweetController::class, 'index'])->name('home');
    Route::post('/tweets',
        [TweetController::class, 'store']);
    Route::post('/tweets/{tweet}/like',
        [TweetLikeController::class, 'store']);
    Route::delete('/tweets/{tweet}/dislike',
        [TweetLikeController::class, 'destroy']);
    Route::post('/profiles/{user:username}/follow',
        [FollowsController::class, 'store'])->name('follow');
    Route::get('/profiles/{user:username}/edit',
        [ProfileController::class, 'edit']);
    Route::patch('/profiles/{user:username}',
        [ProfileController::class, 'update']);
});

Route::get('/profiles/{user:username}',
    [ProfileController::class, 'show'])->name('profile');
Route::get('/explore',
    [ExploreController::class, 'index']);

Auth::routes();

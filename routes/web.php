<?php
use App\Models\Album;
use App\Models\AlbumImage;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogAuthors;
use App\Models\MailMessages;
use App\Models\User;
use App\Models\Menu;
use App\Models\Projects;
use App\Models\Clients;
use App\Models\ContactUs;
use App\Models\Resume;
use App\Models\HomeInfo;
use App\Models\LetsTalk;
use App\Models\ProgrammingLanguage;

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\BlogCategoryController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\HomeInfoController;
use App\Http\Controllers\LetsTalkController;
use App\Http\Controllers\BlogAuthorsController;
use UniSharp\LaravelFilemanager\Lfm;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\MailMessagesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ProgrammingLanguageController;
// use App\Http\Controllers\SubscribersController;
use App\Http\Controllers\UserController;
    /*
    |----------------------------------------------
    | Web Routes
    |----------------------------------------------
    */
    Route::get('/dashboard', function () {
    $users_count = User::all()->count();
    $mail_count = MailMessages::all()->count();
    $messages = MailMessages::latest()->take(5)->get();
    return view('backend.dashboard', compact('messages', 'users_count','mail_count'));
    })->name('dashboard')->middleware(['auth:sanctum', 'verified']);

    Route::group(['prefix' => 'admin'], function () {
    Route::resource('setting', SettingController::class)->middleware(['auth:sanctum', 'verified']);
    Route::get('socialMedia', [SettingController::class, 'socialMedia'])->name('socialMedia')->middleware(['auth:sanctum', 'verified']);
    Route::get('uiUX', [SettingController::class, 'uiUX'])->name('uiUX')->middleware(['auth:sanctum', 'verified']);
    Route::get('seo', [SettingController::class, 'seo'])->name('seo')->middleware(['auth:sanctum', 'verified']);
    Route::resource('menu', MenuController::class)->middleware(['auth:sanctum', 'verified']);
    Route::get('menu/link/course', [MenuController::class, 'menuLinkCourse'])->name('menuLinkCourse');
    Route::post('saveMenuCategory', [MenuController::class, 'create_menuCategory'])->name('saveMenuCategory')->middleware(['auth:sanctum', 'verified']);
    /*------------------------------------------*
    Blogs, Project,
    *------------------------------------------*/
    Route::resource('users', UserController::class)->middleware(['auth:sanctum', 'verified']);
    Route::resource('message', MailMessagesController::class)->middleware(['auth:sanctum', 'verified']);
    Route::get('subscribers', [SubscribersController::class, 'index'])->name('subscribers.index')->middleware(['auth:sanctum', 'verified']);
    Route::delete('subscribers/delete/{id}', [SubscribersController::class, 'destroy'])->name('subscribers.destroy');
    Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {Lfm::routes();});

    Route::resource('programming-language',ProgrammingLanguageController::class)->middleware(['auth']);
    Route::resource('blog-category',BlogCategoryController::class)->middleware(['auth']);
    Route::resource('blogs',BlogController::class)->middleware(['auth']);
    Route::resource('authors',BlogAuthorsController::class)->middleware(['auth']);
    Route::resource('projects',ProjectsController::class)->middleware(['auth']);
    Route::resource('clients',ClientsController::class)->middleware(['auth']);
    // Route::resource('contactus',ContactUsController::class)->middleware(['auth']);
    Route::resource('contact-us',ContactUsController::class)->middleware(['auth']);
    Route::resource('resume',ResumeController::class)->middleware(['auth']);
    Route::resource('homeinfo',HomeInfoController::class)->middleware(['auth']);
    Route::resource('lets-talk',LetsTalkController::class)->middleware(['auth']);

});
    /*------------------------------------------*
    Updated Order-Wise
    *------------------------------------------*/
    Route::post('updateMenu', [MenuController::class, 'updateMenuOrder'])->name('updateMenuOrder');

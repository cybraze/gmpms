<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', fn () => redirect()->route('login'));

Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'login'])->name('login.post');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [UserController::class, 'home'])->name('home');
    Route::get('/create_new_project', [UserController::class, 'create_new_project'])->name('create_new_project');
    Route::post('/new_project/store', [UserController::class, 'store_new_project'])->name('new_project.store');
    Route::get('/project-sheets/{id}', [UserController::class, 'show_sheets'])->name('project_sheets.show');
    Route::get('/object_details/{id}', [UserController::class, 'object_details'])->name('object_details');
    Route::post('/save-preparatory-scope', [UserController::class, 'savePreparatoryScope'])->name('save.preparatory_scope');
    Route::get('/user_details', [UserController::class, 'user_details'])->name('user_details');
    Route::post('/update-progress', [UserController::class, 'updateProgress'])->name('update.progress');

});

require __DIR__.'/neetesh.php';
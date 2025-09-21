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
    Route::get('/section_target_details/{id}', [UserController::class, 'section_target_details'])->name('section_target_details');
    Route::post('/store-section-data', [UserController::class, 'gk_section_store'])->name('store.section.data');
    Route::post('/update-section-data/{id}', [UserController::class, 'update_section_gk'])->name('update.section.data');
    Route::post('/tower_store', [UserController::class, 'tower_section_store'])->name('tower_store');
    Route::post('/tower_update/{id}', [UserController::class, 'tower_update_section'])->name('tower_update');
    Route::post('/ofc_store', [UserController::class, 'ofc_section_store'])->name('ofc_store');
    Route::post('/ofc_update/{id}', [UserController::class, 'ofc_update_section'])->name('ofc_update');








});

require __DIR__.'/neetesh.php';
require __DIR__.'/fayyum.php';
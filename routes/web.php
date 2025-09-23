<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', fn () => redirect()->route('login'));

Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'login'])->name('login.post');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [UserController::class, 'home'])->name('home');

    Route::get('/KavachWorksDashboard', [UserController::class, 'kavach_works_dashboard'])->name('kavach_works_dashboard');
    Route::get('/EIWorksDashboard', [UserController::class, 'ei_works_dashboard'])->name('ei_works_dashboard');
    Route::get('/AutoSignalingDashboard', [UserController::class, 'auto_signaling_dashboard'])->name('auto_signaling_dashboard');
    Route::get('/RobRubDashboard', [UserController::class, 'rob_rub_dashboard'])->name('rob_rub_dashboard');

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



    Route::get('/section/history/{id}', [UserController::class, 'getSectionHistory'])->name('section.history');
    Route::get('/view-tower-history/{id}', [UserController::class, 'getTowerSectionHistory'])->name('tower.section.history');


    Route::get('/view-ofc-history/{id}', [UserController::class, 'getOfcSectionHistory'])->name('ofc.section.history');
Route::get('/view-loco-history/{id}', [UserController::class, 'getLocoKavachHistory'])->name('loco.section.history');

Route::get('/view-training-history/{id}', [UserController::class, 'getTrainingSectionHistory'])
     ->name('training.section.history');


    Route::post('/tower_store', [UserController::class, 'tower_section_store'])->name('tower_store');
    Route::post('/tower_update/{id}', [UserController::class, 'tower_update_section'])->name('tower_update');
    Route::post('/ofc_store', [UserController::class, 'ofc_section_store'])->name('ofc_store');
    Route::post('/ofc_update/{id}', [UserController::class, 'ofc_update_section'])->name('ofc_update');
    Route::get('/loco_kavach_details/{id}', [UserController::class, 'loco_kavach_details'])->name('loco_kavach_details');
    Route::post('/locokavach_store', [UserController::class, 'locokavach_section_store'])->name('locokavach_store');
    Route::post('/locokavach_update/{id}', [UserController::class, 'locokavach_update_section'])->name('locokavach_update');

    Route::get('/training_section_details/{id}', [UserController::class, 'training_section_details'])->name('training_section_details');
    Route::get('/get-staff/{dept}', [UserController::class, 'getStaffByDept'])->name('get.staff.by.dept');
    Route::post('/training_stores', [UserController::class, 'training_section_store'])->name('training_store');
    Route::post('/training_update/{id}', [UserController::class, 'training_update_section'])->name('training_update');


    Route::get('/tender_status_details/{id}', [UserController::class, 'tender_status_details'])->name('tender_status_details');
    Route::post('/KavachTenderStore', [UserController::class, 'kavach_tender_status_store'])->name('kavach_tender_status.store');
     
    Route::post('/KavachTenderStatusUpdate', [UserController::class, 'kavach_tender_status_update'])->name('tender_status.updateField');
    Route::get('/kavach_tender/{id}/history', [UserController::class, 'tender_history'])->name('kavach_tender.history');
    
    

});

require __DIR__.'/neetesh.php';
require __DIR__.'/fayyum.php';
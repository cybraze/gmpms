<?php
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\AutoSignalController;

use App\Http\Controllers\NiController;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/EI_Works', [ProjectController::class, 'project_view'])->name('ei_works');
Route::post('/ProjectInsert', [ProjectController::class, 'projectInsert'])->name('projects.store');
Route::get('/projects/{id}/history', [ProjectController::class, 'history'])->name('projects.history');
Route::post('/projects/update-field', [ProjectController::class, 'updateField'])
     ->name('projects.updateField');

Route::get('/AutoSignalProject', [ProjectController::class, 'auto_signal_project'])
     ->name('auto_signal_project');


Route::get('/get-sections/{division_id}', [AutoSignalController::class, 'getSections'])->name('get.sections');

Route::get('/auto_signal_projects/{id}/history', [AutoSignalController::class, 'history'])->name('auto_signal_projects.history');
Route::get('/AutoSignalProject', [AutoSignalController::class, 'auto_signal_project'])
     ->name('auto_signal_project');
Route::post('/AutoSignalProjectInsert', [AutoSignalController::class, 'Insert'])->name('auto_signal.store');
Route::post('/AutoSignalUpdateField', [AutoSignalController::class, 'updateField'])
     ->name('autosignal.updateField');


Route::get('/NIData', [NiController::class, 'ni_data'])
     ->name('ni_data');
Route::post('/NIInsert', [NiController::class, 'Insert'])->name('ni_data.store');
Route::post('/NIDataUpdateField', [NiController::class, 'updateField'])
     ->name('ni_data.updateField');
Route::get('/ni_data/{id}/history', [NiController::class, 'history'])->name('auto_signal_projects.history');

     




?>

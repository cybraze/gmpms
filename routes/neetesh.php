<?php
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\AutoSignalController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/EI_Works', [ProjectController::class, 'project_view'])->name('ei_works');
Route::post('/ProjectInsert', [ProjectController::class, 'projectInsert'])->name('projects.store');
Route::get('/projects/{id}/history', [ProjectController::class, 'history'])->name('projects.history');
Route::post('/projects/update-field', [ProjectController::class, 'updateField'])
     ->name('projects.updateField');



Route::get('/auto_signal_projects/{id}/history', [AutoSignalController::class, 'history'])->name('auto_signal_projects.history');
Route::get('/AutoSignalProject', [AutoSignalController::class, 'auto_signal_project'])
     ->name('auto_signal_project');
Route::post('/AutoSignalProjectInsert', [AutoSignalController::class, 'Insert'])->name('auto_signal.store');
Route::post('/AutoSignalUpdateField', [AutoSignalController::class, 'updateField'])
     ->name('autosignal.updateField');

     




?>

<?php
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/EI_Works', [ProjectController::class, 'project_view'])->name('ei_works');
Route::post('/ProjectInsert', [ProjectController::class, 'projectInsert'])->name('projects.store');
Route::get('/projects/{id}/history', [ProjectController::class, 'history'])->name('projects.history');
Route::post('/projects/update-field', [ProjectController::class, 'updateField'])
     ->name('projects.updateField');



?>

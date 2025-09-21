<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ObubController;

// Page (list + modal)
Route::get('/OB_UB_Works', [ObubController::class, 'index'])->name('ob_ub_works');

// Create (modal form submit) — matches route('obub.store') used in view
Route::post('/obub', [ObubController::class, 'store'])->name('obub.store');

// Inline update (row-wise AJAX) — matches route('obub.updateField') used in view
Route::post('/obub/update-field', [ObubController::class, 'updateField'])->name('obub.updateField');

Route::get('/obub-data/{id}/history', [ObubController::class, 'obubHistory'])->name('obubData.history');
// (Optional) Agar state→district server-side chahiye ho:
// Route::get('/obub/districts', [ObubController::class, 'districtsByState'])->name('obub.districts');

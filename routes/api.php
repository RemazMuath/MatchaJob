<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\JobImportController;

Route::post('/jobs/import', [JobImportController::class, 'store']);

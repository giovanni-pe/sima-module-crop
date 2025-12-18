<?php

use Illuminate\Support\Facades\Route;

use Modules\Crops\Http\Controllers\Api\CropsController;

Route::prefix('crops')->group(function () {
    Route::get('/',        [CropsController::class, 'index']);
    Route::get('/active',  [CropsController::class, 'active']);
    Route::post('/',       [CropsController::class, 'store']);
    Route::get('/{id}',    [CropsController::class, 'show']);
    Route::put('/{id}',    [CropsController::class, 'update']);
    Route::delete('/{id}', [CropsController::class, 'destroy']);
});
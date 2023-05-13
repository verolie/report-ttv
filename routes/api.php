<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(App\Http\Controllers\Api\PatientController::class)->prefix('patient')->group(function() {
    Route::get('get-all', 'index');
    Route::post('get-patient', 'getPatient');
    Route::post('store', 'store');
    Route::post('delete', 'delete');
    Route::post('update', 'edit');
});
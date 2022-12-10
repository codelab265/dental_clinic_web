<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiLoginController;
use App\Http\Controllers\ApiDentistController;
use App\Http\Controllers\ApiInvoiceController;
use App\Http\Controllers\ApiServiceController;
use App\Http\Controllers\ApiRegisterController;
use App\Http\Controllers\ApiScheduleController;
use App\Http\Controllers\ApiAppointmentController;
use App\Http\Controllers\ApiTransactionController;
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

Route::post('register', [ApiRegisterController::class, 'register']);
Route::post('login', [ApiLoginController::class, 'login']);
Route::get('appointment', [ApiAppointmentController::class, 'index']);
Route::post('appointment/create', [ApiAppointmentController::class, 'store']);
Route::post('appointment/delete', [ApiAppointmentController::class, 'delete']);
Route::post('appointment/edit', [ApiAppointmentController::class, 'edit']);
Route::get('get-services', [ApiAppointmentController::class, 'services']);
Route::get('get-time', [ApiAppointmentController::class, 'time']);


Route::get('services', [ApiServiceController::class, 'index']);
Route::get('dentists', [ApiDentistController::class, 'index']);

Route::get('transactions', [ApiTransactionController::class, 'index']);
Route::get('schedules', [ApiScheduleController::class, 'index']);
Route::get('invoices', [ApiInvoiceController::class, 'index']);
Route::get('invoice/details', [ApiInvoiceController::class, 'details']);
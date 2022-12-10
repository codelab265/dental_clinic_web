<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GetController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DeleteController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminStaffController;
use App\Http\Controllers\AdminDentistController;
use App\Http\Controllers\AdminServiceController;
use App\Http\Controllers\StaffInvoiceController;
use App\Http\Controllers\StaffServiceController;
use App\Http\Controllers\AdminScheduleController;
use App\Http\Controllers\StaffScheduleController;
use App\Http\Controllers\PatientInvoiceController;
use App\Http\Controllers\AdminAppointmentController;
use App\Http\Controllers\StaffTransactionController;
use App\Http\Controllers\Admin\AdminPatientController;
use App\Http\Controllers\AdminMedicalRecordController;
use App\Http\Controllers\AdminTransactionController;
use App\Http\Controllers\OfficialReceiptController;
use App\Http\Controllers\PatientTransactionController;
use App\Http\Controllers\ReportController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/', [LoginController::class, 'login']);
Route::get('register', [RegisterController::class, 'index'])->name('register')->middleware('guest');
Route::post('register', [RegisterController::class, 'store']);
Route::get('logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

//Dashboard routes
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
Route::patch('profile/{id}', [ProfileController::class, 'update'])->name('profile');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth'], function () {
    Route::resource('services', AdminServiceController::class);
    Route::resource('dentist', AdminDentistController::class);
    Route::resource('staff', AdminStaffController::class);
    Route::resource('medical-records', AdminMedicalRecordController::class);
    Route::get('patients', [AdminPatientController::class, 'index'])->name('patients');
    Route::get('appointments', [AdminAppointmentController::class, 'index'])->name('appointments');
    Route::patch('appointments/update/{id}', [AdminAppointmentController::class, 'store'])->name('appointments.update');
    Route::get('appointments/view/{id}', [AdminAppointmentController::class, 'view'])->name('appointments.view');
    Route::resource('invoices', StaffInvoiceController::class);
    Route::get('schedule', [AdminScheduleController::class, 'index'])->name('schedule');
    Route::post('schedule', [AdminScheduleController::class, 'store']);
    Route::patch('schedule/update/{id}', [AdminScheduleController::class, 'update'])->name('schedule.update');
    Route::get('schedule/view/{id}', [AdminScheduleController::class, 'show'])->name('schedule.calendar');
    Route::get('transactions', [AdminTransactionController::class, 'index'])->name('transactions');
    Route::get('transactions/official_receipt/{id}', [AdminTransactionController::class, 'OR'])->name('transactions.OR');
    Route::get('reports/medical-record/{period}', [ReportController::class, 'medical'])->name('reports.medical');
    Route::get('reports/sales/{period}', [ReportController::class, 'sales'])->name('reports.sales');
    Route::resource('official-receipts', OfficialReceiptController::class);
});

Route::group(['prefix' => 'patients', 'as' => 'patients.', 'middleware' => 'auth'], function () {
    Route::get('services', [PatientController::class, 'services'])->name('services');

    Route::get('appointment', [PatientController::class, 'appointment'])->name('appointment');
    Route::post('appointment', [PatientController::class, 'appointmentStore']);
    Route::get('appointment/view/{id}', [PatientController::class, 'appointmentView'])->name('appointment.view');

    Route::get('schedules', [PatientController::class, 'schedules'])->name('schedules');
    Route::get('schedule/view/{id}', [StaffScheduleController::class, 'view'])->name('schedules.view');
    Route::get('dentist', [PatientController::class, 'dentist'])->name('dentist');
    Route::get('dentist/schedule/{id}', [PatientController::class, 'dentist_schedule'])->name('dentist.schedule');
    Route::resource('invoices', PatientInvoiceController::class);
    Route::get('transactions', [PatientTransactionController::class, 'index'])->name('transactions');
    Route::resource('official-receipts', OfficialReceiptController::class);
    Route::get('official-receipt/{id}', [OfficialReceiptController::class, 'view'])->name('official-receipts.view');
});

Route::group(['prefix' => 'staff', 'as' => 'staff.', 'middleware' => 'auth'], function () {
    Route::resource('services', StaffServiceController::class);
    Route::get('schedule', [StaffScheduleController::class, 'index'])->name('schedules');
    Route::get('schedule/update/{id}', [StaffScheduleController::class, 'update'])->name('schedules.update');
    Route::get('schedule/view/{id}', [StaffScheduleController::class, 'view'])->name('schedules.view');

    Route::resource('medical-record', AdminMedicalRecordController::class);
    Route::resource('invoices', StaffInvoiceController::class);
    Route::get('invoice/update/{id}', [StaffInvoiceController::class, 'updateStatus'])->name('invoice.update');
    Route::resource('transactions', StaffTransactionController::class);
    Route::resource('official-receipts', OfficialReceiptController::class);
    Route::get('official-receipt/{id}', [OfficialReceiptController::class, 'view'])->name('official-receipts.view');
});

Route::delete('delete', [DeleteController::class, 'delete'])->name('delete');
Route::get('medical-records', [GetController::class, 'medical_record'])->name('medical_records');
Route::get('invoices', [GetController::class, 'invoice'])->name('invoices');
Route::get('or', [GetController::class, 'or'])->name('OR');
Route::get('schedule_time', [GetController::class, 'schedule_time'])->name('schedule_time');

Route::get('roulette', function () {
    return view('roulette');
});
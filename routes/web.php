<?php

use App\Http\Controllers\EmployeeAttendanceController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ExportController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

Route::get('/', function () {
    return redirect()->route('employees.index');
});

Route::resource('employees', EmployeeController::class)->except('show');

Route::get('employee-attendance', [EmployeeAttendanceController::class, 'index']);
Route::post('employee-attendance', [EmployeeAttendanceController::class, 'store']);
Route::get('employees-export', [ExportController::class, 'employeesExport']);

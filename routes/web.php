<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrganitationController;
use App\Http\Controllers\ReporterController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SafetyController;
use App\Http\Controllers\UserController;
use App\Models\Organitation;
use App\Models\Safety;
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

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/', [DashboardController::class, 'index'])->middleware('auth');

Route::resource('users', UserController::class)->only(['edit', 'update', 'destroy', 'index', 'store'])->middleware('auth');
Route::resource('organitations', OrganitationController::class)->only(['edit', 'update', 'destroy', 'index', 'store'])->middleware('auth');
Route::resource('roles', RoleController::class)->only(['edit', 'update', 'destroy', 'index', 'store'])->middleware('auth');
Route::resource('safeties', SafetyController::class)->only(['edit', 'update', 'destroy', 'index', 'store'])->middleware('auth');
Route::resource('reporter', ReporterController::class)->only(['edit', 'update', 'destroy', 'index', 'store'])->middleware('auth');
Route::post('/download/{path}/{filename}', [SafetyController::class, 'download'])->name('safeties.download');

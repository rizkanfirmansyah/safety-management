<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrganitationController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Models\Organitation;
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

Route::get('/', [DashboardController::class, 'index']);
Route::resource('users', UserController::class)->only(['edit', 'update', 'destroy', 'index', 'store']);
Route::resource('roles', RoleController::class)->only(['edit', 'update', 'destroy', 'index', 'store']);
Route::resource('login', LoginController::class)->only(['login', 'index']);
Route::resource('organitations', OrganitationController::class)->only(['edit', 'update', 'destroy', 'index', 'store']);

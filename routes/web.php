<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\CategoryController;

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

Route::get('dashboard', [CustomAuthController::class, 'dashboard']);
Route::get('/', [CustomAuthController::class, 'index'])->name('/');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');


Route::get('category', [CategoryController::class, 'CategoryIndex'])->name('category');
Route::get('category_add', [CategoryController::class, 'CategoryAdd'])->name('category_add');
Route::post('category_store', [CategoryController::class, 'CategoryStore'])->name('category_store');
Route::get('category_edit/{id}', [CategoryController::class, 'CategoryEdit'])->name('category_edit');
Route::post('category_update/{id}', [CategoryController::class, 'CategoryUpdate'])->name('category_update');
Route::get('category_delete/{id}', [CategoryController::class, 'CategoryDelete'])->name('category_delete');

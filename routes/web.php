<?php

use App\Http\Controllers\CustomerController;
use App\Models\Customer;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\LoginController;

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

Route::get("/login", [LoginController::class, 'login'])->name("login");
Route::post("/login-check", [LoginController::class, 'login_check'])->name("login-check");
Route::get("/logout", [LoginController::class, 'logout']);

Route::middleware('auth')->group(function () {
    Route::get("/", fn() => Inertia::render("Welcome"))->name("home");
    Route::get("/contact", fn() => Inertia::render('Contact'))->name("contact");
    Route::get("/invoice", fn() => Inertia::render('Invoice'))->name("invoice");
    Route::get("/customer", [CustomerController::class, 'show'])->name("customer");
    Route::post("/customer/create", [CustomerController::class, 'create']);
    Route::post("/customer/delete", [CustomerController::class, 'delete']);
});


Route::get("/test", function () {



});


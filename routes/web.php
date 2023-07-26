<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\homePageController;
use App\Http\Controllers\RegisterController;
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



// HomePage Controller
Route::get('/', [homePageController::class, 'homePage'])->name('homePage');

Route::get('/category/{id}', [homePageController::class, 'category'])->name('category');

// Cart Controller
Route::resource('cart', CartController::class);

// Auth Controller
Route::get('/loginPage', [AuthController::class, 'index'])->name('loginPage')->middleware('guest');

Route::post('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/registerPage', [AuthController::class, 'registerPage'])->name('registerPage')->middleware('guest');

Route::post('/register', [AuthController::class, 'register'])->name('register')->middleware('guest');

// Dashboard Controller
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

Route::get('/dashboard/product', [DashboardController::class, 'product'])->name('dashboard.product')->middleware('auth');

Route::get('/dashboard/add/productPage', [DashboardController::class, 'addProductPage'])->name('add.product.page')->middleware('auth');

Route::post('/dashboard/add/product', [DashboardController::class, 'addProduct'])->name('addProduct')->middleware('auth');

Route::post('/dashboard/edit/product/{id}', [DashboardController::class, 'editProduct'])->name('editProduct')->middleware('auth');

Route::delete('/dashboard/delete/product/{id}', [DashboardController::class, 'deleteProduct'])->name('deleteProduct')->middleware('auth');

Route::get('/dashboard/add/categoryPage', [DashboardController::class, 'addCategoryPage'])->name('add.category.page')->middleware('auth');

Route::post('/dashboard/add/category', [DashboardController::class, 'addCategory'])->name('addCategory')->middleware('auth');

Route::post('/dashboard/edit/category/{id}', [DashboardController::class, 'editCategory'])->name('editCategory')->middleware('auth');

Route::get('/dashboard/userPage', [DashboardController::class, 'userPage'])->name('userPage')->middleware('auth');

Route::delete('/dashboard/delete/user/{id}', [DashboardController::class, 'deleteUser'])->name('deleteUser')->middleware('auth');
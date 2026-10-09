<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\ReportController;

Route::get('/login',[AuthController::class,'showLogin'])->name('login');
Route::post('/login',[AuthController::class,'login'])->name('login.post');
Route::post('/logout',[AuthController::class,'logout'])->middleware('auth')->name('logout');
Route::middleware('auth')->group(function(){
 Route::get('/',[DashboardController::class,'index'])->name('dashboard');
 Route::resource('products',ProductController::class);
 Route::resource('categories',CategoryController::class)->except(['show']);
 Route::resource('suppliers',SupplierController::class)->except(['show']);
 Route::get('/stock/in',[StockController::class,'inForm'])->name('stock.in');
 Route::post('/stock/in',[StockController::class,'storeIn'])->name('stock.in.store');
 Route::get('/stock/out',[StockController::class,'outForm'])->name('stock.out');
 Route::post('/stock/out',[StockController::class,'storeOut'])->name('stock.out.store');
 Route::get('/stock/history',[StockController::class,'history'])->name('stock.history');
 Route::get('/reports',[ReportController::class,'index'])->name('reports');
});

<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EBookController;
use App\Http\Controllers\LocalizeController;
use App\Http\Controllers\OrderController;
use App\Http\Middleware\EnsureAdmin;
use App\Http\Middleware\Localize;
use Illuminate\Support\Facades\Route;

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
//default route

Route::get('/lang/{id}', [LocalizeController::class, 'setLang'])->name('lang');

Route::middleware(Localize::class)->group(function(){
    
    Route::middleware('auth')->group(function() {
        //route home user
        Route::get('/home/{locale?}', [AppController::class, 'home'])->name('home');
        Route::get('/logout/{locale?}', [AuthController::class,"logout"])->name('logout');
        Route::get('/cart/{locale?}', [OrderController::class,"cartIndex"])->name('cart.index');
        Route::get('/profile/{locale?}', [AccountController::class,"profileIndex"])->name('profile.index');
        Route::post('/rent/{id}', [OrderController::class,"rent"])->name('rent');
        Route::get('/cart/{locale?}',[OrderController::class,"index"])->name('cart.index');
        Route::delete('/submitcart',[OrderController::class,"submitCart"])->name('cart.submit');
        Route::delete('/deletecart/{id}',[OrderController::class,"deleteCart"])->name('cart.delete');
    
        Route::get('/page-success/{locale?}', [AppController::class, 'pageSuccess'])->name('success');
        Route::get('/page-saved/{locale?}', [AppController::class, 'pageSaved'])->name('saved');
    
        Route::put('update-profile', [AccountController::class, "update"])->name('profile.update');
    
        //route menampilkan detail buku
        Route::get('/detail-book/{id}/{locale?}', [EBookController::class, 'detailBookIndex']);  
    });
    
    Route::middleware('guest')->group(function(){
        Route::get('/',function () {
            return redirect()->route('index');
        });
        
        Route::get('/index/{locale?}', [AppController::class, 'index'])->name('index');
    
        Route::get('/login/{locale?}', [AuthController::class, 'loginIndex'])->name('login.index');
        Route::get('/signup/{locale?}', [AuthController::class, 'signupIndex'])->name('signup.index');
        Route::post('/signingup',[AuthController::class,"signUp"])->name('signup');
        Route::post('/doLogin',[AuthController::class,"doLogin"])->name('login');
    });
    
    Route::middleware(EnsureAdmin::class)->group(function(){
        Route::get('/account-maintenance/{locale?}', [AccountController::class,"maintenanceIndex"])->name('maintenance.index');
        Route::get('/update-role/{id}/{locale?}', [AccountController::class, "updateRoleIndex"])->name('account.update.index');
        Route::put('/updaterole', [AccountController::class, "updateRole"])->name('account.update');
        Route::delete('/delete-account', [AccountController::class, "deleteAccount"])->name('account.delete');
    });

});



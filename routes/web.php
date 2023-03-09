<?php

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

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('give/{id}',[\App\Http\Controllers\AdminController::class,'give'])->name('admin.give');
Route::get('test',[\App\Http\Controllers\AdminController::class,'test']);

Route::get('update/click',[\App\Http\Controllers\AdminController::class,'update_click']);

Route::middleware(['middleware'=>'PreventBackHistory'])->group(function (){
    Auth::routes();
});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix'=>'admin','middleware'=>['isAdmin','auth','PreventBackHistory']],function (){
    Route::get('dashboard',[\App\Http\Controllers\AdminController::class,'index'])->name('admin.dashboard');


    Route::get('websites',[\App\Http\Controllers\AdminController::class,'websites'])->name('admin.websites');
    Route::get('create',[\App\Http\Controllers\AdminController::class,'create'])->name('admin.create');
    Route::post('save',[\App\Http\Controllers\AdminController::class,'save'])->name('admin.save');

    Route::get('new-user',[\App\Http\Controllers\AdminController::class,'new_user'])->name('admin.user');
    Route::post('save-user',[\App\Http\Controllers\AdminController::class,'user_save'])->name('admin.user.new.save');
    Route::get('all-user',[\App\Http\Controllers\AdminController::class,'user_all'])->name('admin.alluser');
    Route::get('user/delete/{id}',[\App\Http\Controllers\AdminController::class,'userdelete'])->name('admin.user.delete');


    Route::post('give',[\App\Http\Controllers\AdminController::class,'assignlink'])->name('admin.assignlink');

    Route::get('informations',[\App\Http\Controllers\AdminController::class,'informations'])->name('admin.informations');
        Route::get('info/delete/{id}',[\App\Http\Controllers\AdminController::class,'infodelte'])->name('admin.info.delete');



    Route::get('profile',[\App\Http\Controllers\AdminController::class,'profile'])->name('admin.profile');
    Route::get('settings',[\App\Http\Controllers\AdminController::class,'settings'])->name('admin.settings');
});


Route::group(['prefix'=>'user','middleware'=>['isUser','auth','PreventBackHistory']],function (){
    Route::get('dashboard',[\App\Http\Controllers\UserController::class,'index'])->name('user.dashboard');
    Route::get('informations',[\App\Http\Controllers\UserController::class,'informations'])->name('user.informations');
    Route::get('websites',[\App\Http\Controllers\UserController::class,'websites'])->name('user.websites');
});

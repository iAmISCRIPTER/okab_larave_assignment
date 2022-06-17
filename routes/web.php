<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authuser;
use App\Http\Controllers\manage\Dashboard;
use App\Http\Controllers\manage\Users;

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
Route::get('/',[Authuser::class,'login'])->name('login');
Route::get('/login',[Authuser::class,'login'])->name('login');
Route::post('/auth/authenticate',[Authuser::class,'Authenticate'])->name('Authenticate');
Route::get('/logout', [Authuser::class,'logout'])->name('logout');

Route::get('/denied', function () {
    return view('denied');
});


Route::group(['middleware'=>'web'],function(){
    /* Route::get('/manage', function () {
        return view('admin_manage/home');
    }); */
    Route::get('/dashboard',[Dashboard::class,'index'])->name('index');
    Route::get('/users/add',[Users::class,'add'])->name('add');
    Route::get('/users/list',[Users::class,'list'])->name('list');
    Route::get('/users/update',[Users::class,'update'])->name('update');
    Route::get('/users/delete',[Users::class,'delete'])->name('delete');

    Route::post('/users/insert',[Users::class,'insert'])->name('insert');
    Route::get('/users/delete/{id}',[Users::class,'delete'])->name('delete');
    Route::get('/users/update/{id}',[Users::class,'update'])->name('update');
    Route::post('/users/savechanges',[Users::class,'savechanges'])->name('savechanges');

    Route::get('/users/search/{str}',[Users::class,'search'])->name('search');
    

});
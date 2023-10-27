<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CustomerController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

// Public Area
Route::get('/frontend',[CustomerController::class,'index'])->name('customer#index');
Route::get('/',[AdminController::class,'signin']);
Route::get('signup',[CustomerController::class,'signup'])->name('customer#signup');
Route::get('signin',[CustomerController::class,'signin'])->name('customer#signin');

Route::get('admin/signin',[AdminController::class,'signin'])->name('admin#signin');
    Route::get('admin/signup',[AdminController::class,'signup'])->name('admin#signup');


Route::group(['middleware'=>['user_auth:customer']],function(){
    Route::get('/my-account',[CustomerController::class,'myaccount'])->name('customer#myaccount');
});


Route::group(['prefix'=>'admin', 'middleware'=>['admin_auth:admin']],function(){
   
    Route::get('/dashboard',[AdminController::class,'dashboard'])->name('admin#dashboard');

    Route::get('/profile',[ProfileController::class,'index'])->name('admin#profiledata');
    Route::get('/profile/create',[ProfileController::class,'create'])->name('admin#profile#create');
    Route::post('/profile/store',[ProfileController::class,'store'])->name('admin#profile#store');
    Route::get('/profile/edit/{id}',[ProfileController::class,'edit'])->name('admin#profile#edit');
    Route::post('/profile/update/{id}',[ProfileController::class,'update'])->name('admin#profile#update');
    Route::get('/profile/delete/{id}',[ProfileController::class,'destroy'])->name('admin#profile#delete');

    //Services
    Route::get('/services',[ServiceController::class,'index'])->name('admin#service#index');
    Route::get('/service/create',[ServiceController::class,'create'])->name('admin#service#create');
    Route::post('/service/store',[ServiceController::class,'store'])->name('admin#service#store');
    Route::get('/service/edit/{id}',[ServiceController::class,'edit'])->name('admin#service#edit');
    Route::post('/service/update/{id}',[ServiceController::class,'update'])->name('admin#service#update');
    Route::get('/service/delete/{id}',[ServiceController::class,'destroy'])->name('admin#service#destroy');

});
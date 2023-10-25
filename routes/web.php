<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProfileController;

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
//Route::get('/',[CustomerController::class,'index'])->name('customer#index');
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

});
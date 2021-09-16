<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\User;
use App\http\Controllers\UserRegistration;
use App\http\Controllers\ControllerFetch;
use App\http\Controllers\StudentController;

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
    return view('welcome');
});
  

Route::get("myuser",[User::Class,"index"]);
Route::get("reg",[UserRegistration::class,"register"]);
Route::post("regist",[UserRegistration::class,"store"]);

Route::get("designation",[ControllerFetch::class,"get_data"]);
Route::get("lists",[UserRegistration::class,"list"]);
Route::get("delete/{id}",[UserRegistration::class,"deletehere"]);
Route::get("edit/{id}",[UserRegistration::class,"ShowData"]);
Route::post("edit",[UserRegistration::class,"updatehere"]);

Route::get('student',[StudentController::class,\"show"]);

Route::get('login',[UserRegistration::class,"login"]);
Route::post('log',[UserRegistration::class,"checklogin"]);
Route::view('profile',"profile")->middleware('auth');
Route::get('logout',function(){
    if(session()->has('email'))
    {
        session()->pull('email');
    }
    return redirect('login');
});
Route::get('myquery',[UserRegistration::class,"querybuild"]);
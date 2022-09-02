<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ImageUploadController;

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

Route::get('/employee',[EmployeeController::class,'index'])->name('employee.index');

Route::get('showemployee', function () {
    return view('employee');
});
// Route::get('/form',[EmployeeController::class,'dropzone']);

// Route::post('/submit',[EmployeeController::class,'upload'])->name('submit');


Route::get('image/upload',[ImageUploadController::class,'fileCreate']);
Route::post('image/upload/store',[ImageUploadController::class,'fileStore']);
Route::post('image/delete',[ImageUploadController::class,'fileDestroy']);

Route::get('select', function () {
    return view('select2');
});


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


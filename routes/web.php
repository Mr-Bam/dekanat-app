<?php

use App\Http\Controllers\AdminStudentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
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

Route::get('/', function () {
    return Redirect::to('/admin/students');
});

Route::get('/home', function () {
    return Redirect::to('/admin/students');
});

Route::resource('/admin/students', AdminStudentController::class)->middleware('auth');
Route::get('/admin/students/{id}/scholarship-payment', [AdminStudentController::class, 'scholarshipPayment'])->middleware('auth');
Route::post('/admin/students/{id}/pay-scholarship', [AdminStudentController::class, 'payScholarship'])->middleware('auth');
Route::get('/admin/students/{id}/view', [AdminStudentController::class, 'view'])->middleware('auth');

Auth::routes();

<?php


use App\Http\Controllers\registerController;
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

// Route::get('/', function () {
//     return view('register');
// });
Route::get('/', [registerController::class, 'userRegister']);
Route::post('/', [registerController::class, 'userRegister']);
Route::post('register', [registerController::class, 'addUser']);
Route::get('/user', [registerController::class, 'getUser']);
Route::get('/user/{id}/edit', [registerController::class, 'editUser']);
Route::put('/user/{id}/editUserData', [registerController::class, 'editUserData']);
Route::get('/user', [registerController::class, 'getUser']);
// Route::put('/user/{id}', [registerController::class, 'updateUser']);
Route::delete('/user/{id}', [registerController::class, 'deleteUser'])->name('deleteUser');
Route::get('register', [registerController::class, 'showRegistrationForm'])->name('userRegister');

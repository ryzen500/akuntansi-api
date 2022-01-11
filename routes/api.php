<?php

use App\Http\Controllers\CitiesController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TransactionDataController;
use App\Http\Controllers\UserController;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->group(function () {
//    url

// });

// Route::middleware('auth:sanctum')->group(function(){
//     Route::get('user', [UserController::class, 'user'])->name('login');

// });
// Transaction API 
Route::get('/transaction',[TransactionController::class,'index']);
Route::get('/transaction/{id}', [TransactionController::class, 'show']);
Route::post('/transaction', [TransactionController::class, 'store']);
Route::put('/transaction/{id}', [TransactionController::class, 'update']);
Route::delete('/transaction/{id}', [TransactionController::class, 'destroy']);

// Country API 
Route::get('/country',[CountryController::class,'index']);
Route::get('/country/{id}', [CountryController::class, 'show']);
Route::post('/country', [CountryController::class, 'store']);
Route::put('/country/{id}', [CountryController::class, 'update']);
Route::delete('/country/{id}', [CountryController::class, 'destroy']);

// Get Transaction Data
Route::get('/data/country', [TransactionDataController::class, 'country']);
Route::get('/data/{country}/states', [TransactionDataController::class, 'states']);
Route::get('/data/{state}/cities', [TransactionDataController::class, 'cities']);


// State API 
Route::get('/state',[StateController::class,'index']);
Route::get('/state/{id}', [StateController::class, 'show']);
Route::post('/state', [StateController::class, 'store']);
Route::put('/state/{id}', [StateController::class, 'update']);
Route::delete('/state/{id}', [StateController::class, 'destroy']);



// Citiy API 
Route::get('/city',[CitiesController::class,'index']);
Route::get('/city/{id}', [CitiesController::class, 'show']);
Route::post('/city', [CitiesController::class, 'store']);
Route::put('/city/{id}', [CitiesController::class, 'update']);
Route::delete('/city/{id}', [CitiesController::class, 'destroy']);






// user API
Route::post('register', [UserController::class, 'register']);
// Route::get('login', [UserController::class, 'login'])->name('login');

Route::post('login', [UserController::class, 'login']);

// Grouping
//Protecting Routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function(Request $request) {
        return auth()->user();
    });
    Route::post('logout', [UserController::class, 'logout']);
});
    
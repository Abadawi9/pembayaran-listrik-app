<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\DataTableController;
use App\Http\Controllers\PelanganController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\TagihanController;
use App\Http\Controllers\TarifController;

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

# ------ Unauthenticated routes ------ #
Route::get('/', [AuthenticatedSessionController::class, 'create']);
require __DIR__.'/auth.php';


# ------ Authenticated routes ------ #
Route::middleware('auth')->group(function() {
    Route::get('/dashboard', [RouteController::class, 'dashboard'])->name('home'); # dashboard

    Route::prefix('profile')->group(function(){
        Route::get('/', [ProfileController::class, 'myProfile'])->name('profile');
        Route::put('/change-ava', [ProfileController::class, 'changeFotoProfile'])->name('change-ava');
        Route::put('/change-profile', [ProfileController::class, 'changeProfile'])->name('change-profile');
    }); # profile group

    # ------ DataTables routes ------ #
    Route::prefix('data')->name('datatable.')->group(function(){
        Route::get('/users', [DataTableController::class, 'getUsers'])->name('users');
    });

    Route::get('/datatable/users', [UserController::class, 'userDataTable'])->name('users.datatables');
    Route::resource('users', UserController::class);
    Route::resource('tarifs', TarifController::class);
    Route::resource('pelanggans', PelanganController::class);
    Route::post('/tagihans/{id}/bayar', [TagihanController::class, 'bayar'])->name('tagihans.bayar');
    Route::resource('tagihans', TagihanController::class);

    Route::get('/struk/{tagihan}', [TagihanController::class, 'getStruk'])->name('tagihans.struk');
});

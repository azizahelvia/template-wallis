<?php

use App\Http\Controllers\Web\CasheerMerchantController;
use App\Http\Controllers\Web\DataTransactionController;
use App\Http\Controllers\Web\DataUserController;
use App\Http\Controllers\Web\EntryInventoryController;
use App\Http\Controllers\Web\ShoppingStudentController;
use App\Http\Controllers\Web\TopupBalanceController;
use App\Http\Controllers\Web\TopupStudentController;
use App\Http\Controllers\Web\TransactionHistoryController;
use Illuminate\Support\Facades\Auth;
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
    return view('auth.login');
});

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // Admin
    Route::prefix('data_user')->group(function () {
        Route::get('/', [DataUserController::class, 'index'])->name('datauser.index');
        Route::post('/add_user', [DataUserController::class, 'store'])->name('datauser.add');
        Route::put('/edit_user/{id}', [DataUserController::class, 'update'])->name('datauser.edit');
        Route::delete('/delete_user/{id}', [DataUserController::class, 'destroy'])->name('datauser.delete');
    });

    Route::prefix('data_transaksi')->group(function () {
        Route::get('/', [DataTransactionController::class, 'index'])->name('datatransaction.index');
    });

    Route::prefix('riwayat_transaksi')->group(function () {
        Route::get('/', [TransactionHistoryController::class, 'index'])->name('transactionhistory.index');
    });

    // Bank Mini
    Route::prefix('pengajuan_saldo')->group(function () {
        Route::get('/', [TopupBalanceController::class, 'index'])->name('topupbalance.index');
        Route::get('/approved_saldo/{transaction_id}', [TopupBalanceController::class, 'approved'])->name('topupbalance.approved');
        Route::get('/rejected_saldo/{transaction_id}', [TopupBalanceController::class, 'rejected'])->name("topupbalance.rejected");
        Route::get('/riwayatsaldo', [TopupBalanceController::class, 'history'])->name('topupbalance.history');
    });

    // Kantin
    Route::prefix('kasir_kantin')->group(function() {
        Route::get('/', [CasheerMerchantController::class, 'index'])->name('casheermerchant.index');
    });
    Route::prefix('data_barang')->group(function() {
        Route::get('/', [EntryInventoryController::class, 'index'])->name('entryinventory.index');
        Route::post('/add_barang', [EntryInventoryController::class, 'store'])->name('entryinventory.store');
        Route::put('/edit_barang/{id}', [EntryInventoryController::class, 'update'])->name('entryinventory.update');
        Route::get('/delete_barang/{id}', [EntryInventoryController::class, 'destroy'])->name('entryinventory.delete');
    });

    // Siswa
    Route::prefix('topup_saldo')->group(function() {
        Route::get('/', [TopupStudentController::class, 'index'])->name('topupsaldo.index');
        Route::post('/add', [TopupStudentController::class, 'store'])->name('topupsaldo.add');
    });
    Route::prefix('belanja')->group(function() {
        Route::get('/', [ShoppingStudentController::class, 'index'])->name('belanjasiswa.index');
    });
    Route::prefix('riwayat_transaksi_siswa')->group(function() {
        Route::get('/', [ShoppingStudentController::class, 'history'])->name('riwayatsiswa.index');
    });
});


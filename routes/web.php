
<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\BookingController;

use App\Models\Layanan;

Route::get('/', function () {
    $layanans = Layanan::all();

    return view('welcome', compact('layanans'));
})->name('home');

Auth::routes();

// ROUTE ADMIN
Route::middleware(['auth', 'isAdmin'])->group(function () {

    Route::get('/admin', [AdminController::class, 'index'])
        ->name('admin.index');

    // LAYANAN
    Route::get('/admin/dashboardLayanan', [LayananController::class, 'index'])
        ->name('admin.dashboardLayanan');

    Route::get('/admin/tambahLayanan', [LayananController::class, 'create'])
        ->name('admin.tambahLayanan');

    Route::post('/admin/layanan', [LayananController::class, 'store'])
        ->name('admin.layanan.store');

    Route::get('/admin/layanan/{id}/edit', [LayananController::class, 'edit'])
        ->name('admin.layanan.edit');

    Route::put('/admin/layanan/{id}', [LayananController::class, 'update'])
        ->name('admin.layanan.update');

    Route::delete('/admin/layanan/{id}', [LayananController::class, 'destroy'])
        ->name('admin.layanan.destroy');

    // HALAMAN ADMIN LAINNYA

    Route::get('/admin/pesan/{pesan}/balas', [AdminController::class, 'balasPesan'])
    ->name('admin.balasPesan');

     Route::post('/admin/pesan/{pesan}/kirim-balasan', [AdminController::class, 'kirimBalasan']) 
    ->name('admin.kirimBalasan');







    
    Route::get('/admin/dashboardPengingat', [AdminController::class, 'dashboardPengingat'])
        ->name('admin.dashboardPengingat');

    Route::get('/admin/dashboardPesan', [AdminController::class, 'dashboardPesan'])
        ->name('admin.dashboardPesan');

    Route::get('/admin/dashboardUlasan', [AdminController::class, 'dashboardUlasan'])
        ->name('admin.dashboardUlasan');

    Route::get('/admin/dashboardJadwal', [AdminController::class, 'dashboardJadwal'])
        ->name('admin.dashboardJadwal');

    
});

// ROUTE USER
Route::middleware(['auth', 'isUser'])->group(function () {

    Route::get('/user', [UserController::class, 'index'])
        ->name('user.index');

    Route::post('/user/kirim-pesan', [PesanController::class, 'store'])
    ->name('user.pesan.store');    


    // Tambah layanan ke keranjang
Route::post('/user/keranjang/tambah', [UserController::class, 'tambahKeranjang'])
    ->name('user.keranjang.tambah');

// Hapus layanan dari keranjang
Route::delete('/user/keranjang/{id}', [UserController::class, 'hapusKeranjang'])
    ->name('user.keranjang.hapus');


// CHECKOUT BOOKING
Route::post('/user/checkout', [BookingController::class, 'checkout'])
    ->name('user.checkout');



    Route::get('/user/keranjang', [UserController::class, 'keranjang'])
        ->name('user.keranjang');

    Route::get('/user/pesanan', [UserController::class, 'pesanan'])
        ->name('user.pesanan');

    Route::get('/user/layananUser', [UserController::class, 'layananUser'])
        ->name('user.layananUser');

    Route::get('/user/kirimPesan', [UserController::class, 'kirimPesan'])
        ->name('user.kirimPesan');

    Route::get('/user/qris', [UserController::class, 'qris'])
        ->name('user.qris');

    Route::get('/user/bank', [UserController::class, 'bank'])
        ->name('user.bank');
});

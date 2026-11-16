<?php
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.beranda');
});

Route::get('/kontak', function () {
    return view('pages.kontak');
});

Route::get('/about', function () {
    return view('pages.about', [
        'nama' => 'Giftalla Mauly Faidza',
        'kelas' => 'D4SM-01-02',
        'nim' => '707082400048',
    ]);
});

Route::get('/latihan', function () {
    $matakuliah = ['Pemrograman Web', 'Basis Data', 'UI/UX'];
    return view('pages.latihan', ['matakuliah' => $matakuliah]);
});

Route::get('/mahasiswa', [MahasiswaController::class, 'index']);

// ROUTE PRODUCT
Route::get('/product', [ProductController::class, 'index']);
Route::get('/product/addProduct', [ProductController::class, 'addProduct']);
Route::post('/product', [ProductController::class, 'store']);

Route::get('/product/{id}', [ProductController::class, 'show']);
Route::get('/product/{id}/edit', [ProductController::class, 'edit']);
Route::put('/product/{id}', [ProductController::class, 'update']);
Route::delete('/product/{id}', [ProductController::class, 'destroy']);

// RESOURCE ROUTE CATEGORY
Route::resource('category', CategoryController::class)->only([
    'index', 'store', 'update', 'destroy'
]);



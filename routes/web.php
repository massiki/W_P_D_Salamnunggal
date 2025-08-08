<?php

use App\Http\Controllers\AboutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GaleryController;
use App\Http\Controllers\GambarStrukturController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\InfoKontakController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PendudukController;
use App\Http\Controllers\PotensiController;
use App\Http\Controllers\SambutanController;
use App\Http\Controllers\SosmedController;
use App\Http\Controllers\StructureController;
use App\Http\Controllers\UmkmController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VisiMisiController;

Route::get('/', [DashboardController::class, 'welcome'])->name('user.welcome');

// about
Route::get('/tentang/histori', [AboutController::class, 'history'])->name('user.about.history');
Route::get('/tentang/profile', [AboutController::class, 'profile'])->name('user.about.profile');
Route::get('/tentang/struktur-pemerintahan', [AboutController::class, 'structure'])->name('user.about.structure');

// kontak
Route::get('/kontak-kami', [ContactController::class, 'front'])->name('user.contact');
Route::post('/kontak-kami', [ContactController::class, 'store'])->name('user.contact.store');

// galeri
Route::get('/galeri', [GaleryController::class, 'front'])->name('user.galeri');

// informasi produk
Route::get('/informasi/potensi', [InformasiController::class, 'potensi'])->name('user.informasi.potensi');
Route::get('/informasi/produk-umkm', [InformasiController::class, 'umkm'])->name('user.informasi.umkm');

// berita
Route::get('/berita', [NewsController::class, 'front'])->name('user.berita');
Route::get('/berita/{news:slug}', [NewsController::class, 'detail'])->name('user.berita.detail');

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticate'])->name('auth');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');

    // sambutan
    Route::get('/admin/sambutan', [SambutanController::class, 'index'])->name('admin.sambutan');
    Route::get('/admin/sambutan/{sambutan}/edit', [SambutanController::class, 'edit'])->name('admin.sambutan.edit');
    Route::put('/admin/sambutan/{sambutan}', [SambutanController::class, 'update'])->name('admin.sambutan.update');

    // visi misi
    Route::get('/admin/visi-misi', [VisiMisiController::class, 'index'])->name('admin.visi-misi');
    Route::get('/admin/visi-misi/{visiMisi}/edit', [VisiMisiController::class, 'edit'])->name('admin.visi-misi.edit');
    Route::put('/admin/visi-misi/{visiMisi}', [VisiMisiController::class, 'update'])->name('admin.visi-misi.update');

    // gambar struktur
    Route::get('/admin/gambar-struktur', [GambarStrukturController::class, 'index'])->name('admin.gambar-struktur');
    Route::get('/admin/gambar-struktur/{image}/edit', [GambarStrukturController::class, 'edit'])->name('admin.gambar-struktur.edit');
    Route::put('/admin/gambar-struktur/{image}',  [GambarStrukturController::class, 'update'])->name('admin.gambar-struktur.update');

    // struktur pemerintahan
    Route::get('/admin/struktur-pemerintahan', [StructureController::class, 'index'])->name('admin.struktur-pemerintahan');
    Route::get('/admin/struktur-pemerintahan/create', [StructureController::class, 'create'])->name('admin.struktur-pemerintahan.create');
    Route::post('/admin/struktur-pemerintahan', [StructureController::class, 'store'])->name('admin.struktur-pemerintahan.store');
    Route::get('/admin/struktur-pemerintahan/{structure}/edit', [StructureController::class, 'edit'])->name('admin.struktur-pemerintahan.edit');
    Route::put('/admin/struktur-pemerintahan/{structure}', [StructureController::class, 'update'])->name('admin.struktur-pemerintahan.update');
    Route::delete('/admin/struktur-pemerintahan/{structure}', [StructureController::class, 'destroy'])->name('admin.struktur-pemerintahan.destroy');

    // histori
    Route::get('/admin/histori', [HistoryController::class, 'index'])->name('admin.histori');
    Route::get('/admin/histori/create', [HistoryController::class, 'create'])->name('admin.histori.create');
    Route::post('/admin/histori', [HistoryController::class, 'store'])->name('admin.histori.store');
    Route::get('/admin/histori/{history}/edit', [HistoryController::class, 'edit'])->name('admin.histori.edit');
    Route::put('/admin/histori/{history}', [HistoryController::class, 'update'])->name('admin.histori.update');
    Route::delete('/admin/histori/{history}', [HistoryController::class, 'destroy'])->name('admin.histori.destroy');

    // umkm
    Route::get('/admin/umkm', [UmkmController::class, 'index'])->name('admin.umkm');
    Route::get('/admin/umkm/create', [UmkmController::class, 'create'])->name('admin.umkm.create');
    Route::post('/admin/umkm', [UmkmController::class, 'store'])->name('admin.umkm.store');
    Route::get('/admin/umkm/{umkm}/edit', [UmkmController::class, 'edit'])->name('admin.umkm.edit');
    Route::put('/admin/umkm/{umkm}', [UmkmController::class, 'update'])->name('admin.umkm.update');
    Route::delete('/admin/umkm/{umkm}', [UmkmController::class, 'destroy'])->name('admin.umkm.destroy');

    // potensi
    Route::get('/admin/potensi', [PotensiController::class, 'index'])->name('admin.potensi');
    Route::get('/admin/potensi/create', [PotensiController::class, 'create'])->name('admin.potensi.create');
    Route::post('/admin/potensi', [PotensiController::class, 'store'])->name('admin.potensi.store');
    Route::get('/admin/potensi/{potensi}/edit', [PotensiController::class, 'edit'])->name('admin.potensi.edit');
    Route::put('/admin/potensi/{potensi}', [PotensiController::class, 'update'])->name('admin.potensi.update');
    Route::delete('/admin/potensi/{potensi}', [PotensiController::class, 'destroy'])->name('admin.potensi.destroy');

    // galeri
    Route::get('/admin/galeri', [GaleryController::class, 'index'])->name('admin.galeri');
    Route::get('/admin/galeri/create', [GaleryController::class, 'create'])->name('admin.galeri.create');
    Route::post('/admin/galeri', [GaleryController::class, 'store'])->name('admin.galeri.store');
    Route::get('/admin/galeri/{image}/edit', [GaleryController::class, 'edit'])->name('admin.galeri.edit');
    Route::put('/admin/galeri/{image}', [GaleryController::class, 'update'])->name('admin.galeri.update');
    Route::delete('/admin/galeri/{image}', [GaleryController::class, 'destroy'])->name('admin.galeri.destroy');

    // news atau berita
    Route::get('/admin/berita', [NewsController::class, 'index'])->name('admin.berita');
    Route::get('/admin/berita/create', [NewsController::class, 'create'])->name('admin.berita.create');
    Route::post('/admin/berita', [NewsController::class, 'store'])->name('admin.berita.store');
    Route::get('admin/berita/{news}/edit', [NewsController::class, 'edit'])->name('admin.berita.edit');
    Route::put('admin/berita/{news}', [NewsController::class, 'update'])->name('admin.berita.update');
    Route::delete('admin/berita/{news}', [NewsController::class, 'destroy'])->name('admin.berita.destroy');

    // Backgournd dan Logo
    Route::get('/admin/image', [ImageController::class, 'index'])->name('admin.image');
    Route::get('/admin/image/create', [ImageController::class, 'create'])->name('admin.image.create');
    Route::post('/admin/image', [ImageController::class, 'store'])->name('admin.image.store');
    Route::get('/admin/image/{image}/edit', [ImageController::class, 'edit'])->name('admin.image.edit');
    Route::put('/admin/image/{image}', [ImageController::class, 'update'])->name('admin.image.update');
    Route::delete('/admin/image/{image}', [ImageController::class, 'destroy'])->name('admin.image.destroy');

    // Sosmed
    Route::get('/admin/sosmed', [SosmedController::class, 'index'])->name('admin.sosmed');
    Route::get('/admin/sosmed/create', [SosmedController::class, 'create'])->name('admin.sosmed.create');
    Route::post('/admin/sosmed', [SosmedController::class, 'store'])->name('admin.sosmed.store');
    Route::get('/admin/sosmed/{sosmed}/edit', [SosmedController::class, 'edit'])->name('admin.sosmed.edit');
    Route::put('/admin/sosmed/{sosmed}', [SosmedController::class, 'update'])->name('admin.sosmed.update');
    Route::delete('/admin/sosmed/{sosmed}', [SosmedController::class, 'destroy'])->name('admin.sosmed.destroy');

    // info kontak
    Route::get('/admin/info-kontak', [InfoKontakController::class, 'index'])->name('admin.info-kontak');
    Route::get('/admin/info-kontak/create', [InfoKontakController::class, 'create'])->name('admin.info-kontak.create');
    Route::post('/admin/info-kontak', [InfoKontakController::class, 'store'])->name('admin.info-kontak.store');
    Route::get('/admin/info-kontak/{infoKontak}/edit', [InfoKontakController::class, 'edit'])->name('admin.info-kontak.edit');
    Route::put('/admin/info-kontak/{infoKontak}', [InfoKontakController::class, 'update'])->name('admin.info-kontak.update');
    Route::delete('/admin/info-kontak/{infoKontak}', [InfoKontakController::class, 'destroy'])->name('admin.info-kontak.destroy');

    // jumlah penduduk
    Route::get('/admin/penduduk', [PendudukController::class, 'index'])->name('admin.penduduk');
    Route::get('/admin/penduduk/create', [PendudukController::class, 'create'])->name('admin.penduduk.create');
    Route::post('/admin/penduduk', [PendudukController::class, 'store'])->name('admin.penduduk.store');
    Route::get('/admin/penduduk/{penduduk}/edit', [PendudukController::class, 'edit'])->name('admin.penduduk.edit');
    Route::put('/admin/penduduk/{penduduk}', [PendudukController::class, 'update'])->name('admin.penduduk.update');
    Route::delete('/admin/penduduk/{penduduk}', [PendudukController::class, 'destroy'])->name('admin.penduduk.destroy');

    // kontak
    Route::get('/admin/kontak', [ContactController::class, 'index'])->name('admin.kontak');

    // card
    Route::get('/admin/card', [CardController::class, 'index'])->name('admin.card');
    Route::get('/admin/card/{card}/edit', [CardController::class, 'edit'])->name('admin.card.edit');
    Route::put('/admin/card/{card}', [CardController::class, 'update'])->name('admin.card.update');

    // user
    Route::get('/admin/user', [UserController::class, 'index'])->name('admin.user');
    Route::put('/admin/user/{user}', [UserController::class, 'update'])->name('admin.user.update');

    // auth
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

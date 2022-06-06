<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\JadwalEventController;
use App\Http\Controllers\JadwalKelilingController;
use App\Http\Controllers\KonfirmasiController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\ManfaatController;
use App\Http\Controllers\PertanyaanController;
use App\Http\Controllers\ProsedurController;
use App\Http\Controllers\StatusRequestController;
use App\Http\Controllers\SyaratController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
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
    return view('welcome-redora');
})->name('dashboard');

Route::get('/test', [TestController::class, 'viewTest']);

Auth::routes();

Route::prefix('user')->name('user.')->group(
    function () {
    Route::middleware(['guest:user'])->group(function () {
        Route::view('/login', 'user.login')->name('user-login');
        Route::view('/register', 'user.register')->name('user-register');

        Route::get('/prosedurFront', [UserController::class, 'frontProsedur'])->name('front-prosedur');
        Route::get('/manfaatFront', [UserController::class, 'frontManfaat'])->name('front-manfaat');
        Route::get('/semuaRequest', [UserController::class, 'semuaRequest'])->name('semua-request');
        Route::get('/showPage/{id}', [UserController::class, 'showPage'])->name('show-permintaan');
        Route::any('/showPage/update/{id}', [UserController::class, 'ikutDonor'])->name('ikut-donor');
          
        
        Route::post('/register/post', [UserController::class, 'store'])->name('user-store');    
        Route::post('/login/check', [UserController::class, 'check'])->name('user-check');

        // 
    });

    Route::middleware(['auth:user'])->group(function () {
        // Route::get('/', [StatusRequestController::class, 'index'])->name('home');
        Route::get('/', [FrontController::class, 'index'])->name('home');
        Route::get('/requestPage', [FrontController::class, 'requestPage'])->name('requestPage');
        Route::get('/manfaatPage', [FrontController::class, 'manfaatPage'])->name('manfaatPage');
        Route::get('/prosedurPage', [FrontController::class, 'prosedurPage'])->name('prosedurPage');
        Route::get('/lokasiPage', [FrontController::class, 'lokasiPage'])->name('lokasiPage');
        Route::get('/jadwalPage', [FrontController::class, 'jadwalPage'])->name('jadwalPage');
        Route::get('/faqPage', [FrontController::class, 'faqPage'])->name('faqPage');
        Route::get('/konfirmasiPage', [KonfirmasiController::class, 'index'])->name('konfirmasiPage');
        
        Route::get('/status-request/show-home/{id}', [StatusRequestController::class, 'showHome'])->name('status-request-show-home');
        Route::get('/status-request/show/{id}', [StatusRequestController::class, 'show'])->name('status-request-show');
        Route::post('/create-status-request/post', [StatusRequestController::class, 'store'])->name('status-request-store');
        Route::get('/create-status-request/edit', [StatusRequestController::class, 'edit'])->name('status-request-edit');
        Route::any('/create-status-request/update/{id}', [StatusRequestController::class, 'update'])->name('status-request-update');
        Route::any('/create-status-request/update-status/{id}', [StatusRequestController::class, 'updateStatus'])->name('status-request-update-status');
        Route::get('/create-status-request/konfirmasi-form/{id}', [StatusRequestController::class, 'konfirmasiForm'])->name('konfirmasi-form');
        Route::put('/create-status-request/konfirmasi-update/{id}', [StatusRequestController::class, 'konfirmasiPost'])->name('konfirmasi-post');
        Route::get('/redirect', [StatusRequestController::class, 'redirect'])->name('redirect');
        Route::get('/manfaat', [ManfaatController::class, 'isiManfaat'])->name('manfaat');
        Route::any('/konfirmasi-donor/update/{id}', [KonfirmasiController::class, 'update'])->name('konfirmasi-donor');

        // sayThanks
        Route::any('/create-status-request/send/{id_pemohon}/{id_pendonor}', [StatusRequestController::class, 'send'])->name('status-request-send');

        // isiLangsung
        Route::any('/create-status-request/isi/update/{id}', [StatusRequestController::class, 'isiUpdate'])->name('status-request-isi-update');

        // pertanyaan user
        Route::post('/send-email', [PertanyaanController::class, 'post'])->name('send-email');

        // konfirmasiPage
        

        Route::post('/logout', [UserController::class, 'logout'])->name('user-logout');
    });
});

Route::prefix('admin')->name('admin-')->group(
    function () {
        Route::middleware(['guest:admin', 'PreventBackHistory'])->group(function () {
            Route::view('/login', 'admin.login')->name('login');            
            Route::post('/login/check', [AdminController::class, 'check'])->name('check');
        });

        Route::middleware(['auth:admin', 'PreventBackHistory'])->group(function () {
            Route::get('/index-admin', [DashboardController::class, 'indexAdmin'])->name('index');

            Route::get('/tabel-faq', [FaqController::class, 'index'])->name('faq-index');
            Route::get('/create-faq', [FaqController::class, 'create'])->name('faq-create');
            Route::post('/create-faq/post', [FaqController::class, 'store'])->name('faq-store');
            Route::get('/create-faq/edit/{id}', [FaqController::class, 'edit'])->name('faq-edit');
            Route::put('/create-faq/update/{id}', [FaqController::class, 'update'])->name('faq-update');
            Route::get('/create-faq/delete/{id}', [FaqController::class, 'destroy'])->name('faq-delete');


            Route::get('/tabel-manfaat', [ManfaatController::class, 'index'])->name('manfaat-index');
            Route::get('/create-manfaat', [ManfaatController::class, 'create'])->name('manfaat-create');
            Route::post('/create-manfaat/post', [ManfaatController::class, 'store'])->name('manfaat-store');
            Route::get('/create-manfaat/edit/{id}', [ManfaatController::class, 'edit'])->name('manfaat-edit');
            Route::put('/create-manfaat/update/{id}', [ManfaatController::class, 'update'])->name('manfaat-update');
            Route::get('/create-manfaat/delete/{id}', [ManfaatController::class, 'destroy'])->name('manfaat-delete');


            Route::get('/tabel-prosedur', [ProsedurController::class, 'index'])->name('prosedur-index');
            Route::get('/create-prosedur', [ProsedurController::class, 'create'])->name('prosedur-create');
            Route::post('/create-prosedur/post', [ProsedurController::class, 'store'])->name('prosedur-store');
            Route::get('/create-prosedur/edit/{id}', [ProsedurController::class, 'edit'])->name('prosedur-edit');
            Route::put('/create-prosedur/update/{id}', [ProsedurController::class, 'update'])->name('prosedur-update');
            Route::get('/create-prosedur/delete/{id}', [ProsedurController::class, 'destroy'])->name('prosedur-delete');


            Route::get('/tabel-syarat', [SyaratController::class, 'index'])->name('syarat-index');
            Route::get('/create-syarat', [SyaratController::class, 'create'])->name('syarat-create');
            Route::post('/create-syarat/post', [SyaratController::class, 'store'])->name('syarat-store');
            Route::get('/create-syarat/edit/{id}', [SyaratController::class, 'edit'])->name('syarat-edit');
            Route::put('/create-syarat/update/{id}', [SyaratController::class, 'update'])->name('syarat-update');
            Route::get('/create-syarat/delete/{id}', [SyaratController::class, 'destroy'])->name('syarat-delete');


            Route::get('/tabel-lokasi', [LokasiController::class, 'index'])->name('lokasi-index');
            Route::get('/create-lokasi', [LokasiController::class, 'create'])->name('lokasi-create');
            Route::post('/create-lokasi/post', [LokasiController::class, 'store'])->name('lokasi-store');
            Route::get('/create-lokasi/edit/{id}', [LokasiController::class, 'edit'])->name('lokasi-edit');
            Route::put('/create-lokasi/update/{id}', [LokasiController::class, 'update'])->name('lokasi-update');
            Route::get('/create-lokasi/delete/{id}', [LokasiController::class, 'destroy'])->name('lokasi-delete');

            Route::get('/tabel-pertanyaan', [PertanyaanController::class, 'index'])->name('pertanyaan-index');

            Route::get('/tabel-jadwal-event', [JadwalEventController::class, 'index'])->name('jadwal-event-index');
            Route::get('/create-jadwal-event', [JadwalEventController::class, 'create'])->name('jadwal-event-create');
            Route::post('/create-jadwal-event/post', [JadwalEventController::class, 'store'])->name('jadwal-event-store');
            Route::get('/create-jadwal-event/edit/{id}', [JadwalEventController::class, 'edit'])->name('jadwal-event-edit');
            Route::put('/create-jadwal-event/update/{id}', [JadwalEventController::class, 'update'])->name('jadwal-event-update');
            Route::get('/create-jadwal-event/delete/{id}', [JadwalEventController::class, 'destroy'])->name('jadwal-event-delete');
            
            // Route::get('/tabel-jadwal-keliling', [JadwalKelilingController::class, 'index'])->name('jadwal-keliling-index');
            // Route::get('/create-jadwal-keliling', [JadwalKelilingController::class, 'create'])->name('jadwal-keliling-create');
            // Route::post('/create-jadwal-keliling/post', [JadwalKelilingController::class, 'store'])->name('jadwal-keliling-store');
            // Route::get('/create-jadwal-keliling/edit/{id}', [JadwalKelilingController::class, 'edit'])->name('jadwal-keliling-edit');
            // Route::put('/create-jadwal-keliling/update/{id}', [JadwalKelilingController::class, 'update'])->name('jadwal-keliling-update');
            // Route::get('/create-jadwal-keliling/delete/{id}', [JadwalKelilingController::class, 'destroy'])->name('jadwal-keliling-delete');

            Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
        });
    }
);



// Admin


// Route::get('/admin-login', [AdminController::class, 'login'])->name('admin-login');

// Route::get('/index-admin', [DashboardController::class, 'indexAdmin'])->name('admin-index');

// Route::get('/tabel-faq', [FaqController::class, 'index'])->name('faq-index');
// Route::get('/create-faq', [FaqController::class, 'create'])->name('faq-create');
// Route::post('/create-faq/post', [FaqController::class, 'store'])->name('faq-store');
// Route::get('/create-faq/edit/{id}', [FaqController::class, 'edit'])->name('faq-edit');
// Route::put('/create-faq/update/{id}', [FaqController::class, 'update'])->name('faq-update');
// Route::get('/create-faq/delete/{id}', [FaqController::class, 'destroy'])->name('faq-delete');


// Route::get('/tabel-manfaat', [ManfaatController::class, 'index'])->name('manfaat-index');
// Route::get('/create-manfaat', [ManfaatController::class, 'create'])->name('manfaat-create');
// Route::post('/create-manfaat/post', [ManfaatController::class, 'store'])->name('manfaat-store');
// Route::get('/create-manfaat/edit/{id}', [ManfaatController::class, 'edit'])->name('manfaat-edit');
// Route::put('/create-manfaat/update/{id}', [ManfaatController::class, 'update'])->name('manfaat-update');
// Route::get('/create-manfaat/delete/{id}', [ManfaatController::class, 'destroy'])->name('manfaat-delete');


// Route::get('/tabel-prosedur', [ProsedurController::class, 'index'])->name('prosedur-index');
// Route::get('/create-prosedur', [ProsedurController::class, 'create'])->name('prosedur-create');
// Route::post('/create-prosedur/post', [ProsedurController::class, 'store'])->name('prosedur-store');
// Route::get('/create-prosedur/edit/{id}', [ProsedurController::class, 'edit'])->name('prosedur-edit');
// Route::put('/create-prosedur/update/{id}', [ProsedurController::class, 'update'])->name('prosedur-update');
// Route::get('/create-prosedur/delete/{id}', [ProsedurController::class, 'destroy'])->name('prosedur-delete');


// Route::get('/tabel-lokasi', [LokasiController::class, 'index'])->name('lokasi-index');
// Route::get('/create-lokasi', [LokasiController::class, 'create'])->name('lokasi-create');
// Route::post('/create-lokasi/post', [LokasiController::class, 'store'])->name('lokasi-store');
// Route::get('/create-lokasi/edit/{id}', [LokasiController::class, 'edit'])->name('lokasi-edit');
// Route::put('/create-lokasi/update/{id}', [LokasiController::class, 'update'])->name('lokasi-update');
// Route::get('/create-lokasi/delete/{id}', [LokasiController::class, 'destroy'])->name('lokasi-delete');


// Route::get('/tabel-jadwal-keliling', [JadwalKelilingController::class, 'index'])->name('jadwal-keliling-index');
// Route::get('/create-jadwal-keliling', [JadwalKelilingController::class, 'create'])->name('jadwal-keliling-create');
// Route::post('/create-jadwal-keliling/post', [JadwalKelilingController::class, 'store'])->name('jadwal-keliling-store');
// Route::get('/create-jadwal-keliling/edit/{id}', [JadwalKelilingController::class, 'edit'])->name('jadwal-keliling-edit');
// Route::put('/create-jadwal-keliling/update/{id}', [JadwalKelilingController::class, 'update'])->name('jadwal-keliling-update');
// Route::get('/create-jadwal-keliling/delete/{id}', [JadwalKelilingController::class, 'destroy'])->name('jadwal-keliling-delete');


// User
// Route::get('/tabel-status-request', [StatusRequestController::class, 'index'])->name('status-request-index');
// Route::get('/create-status-request', [StatusRequestController::class, 'create'])->name('status-request-create');
// Route::post('/create-status-request/post', [StatusRequestController::class, 'store'])->name('status-request-store');
// Route::get('/create-status-request/edit/{id}', [StatusRequestController::class, 'edit'])->name('status-request-edit');
// Route::put('/create-status-request/update/{id}', [StatusRequestController::class, 'update'])->name('status-request-update');
// Route::put('/create-status-request/update-status/{id}', [StatusRequestController::class, 'updateStatus'])->name('status-request-update-status');
// Route::get('/create-status-request/delete/{id}', [StatusRequestController::class, 'destroy'])->name('status-request-delete');


// 

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\page\BergabungController;
use App\Http\Controllers\page\BeritaController;
use App\Http\Controllers\page\DonateController;
use App\Http\Controllers\page\IndexController;
use App\Http\Controllers\page\ProgramController;
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

Route::get('/', [IndexController::class, 'index']);
Route::get('/berita', [BeritaController::class, 'berita']);
Route::get('/berita/{slug}', [BeritaController::class, 'beritaDetail']);
Route::get('/program', [ProgramController::class, 'program']);
Route::get('/program/{slug}', [ProgramController::class, 'programDetail']);
Route::get('/contact', fn() => view('Page.page.contact'));
Route::get('/bergabung', [BergabungController::class, 'bergabung']);
Route::get('/bergabung/{id}', [BergabungController::class, 'show']);
Route::post('/bergabung', [BergabungController::class, 'store']);
Route::post('/donate', [DonateController::class, 'donate']);

Route::get('/login', function () {
    return view('Admin.Page.login');
});
Route::post('/login', [AuthController::class, 'login'])->name('login');


Route::group(['middleware' => ['auth', 'role:SuperAdmin|Admin|Volunteer']],
    function () {

        Route::get('/dashboard', [AuthController::class, 'dashboard']);
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

        require __DIR__ . '/admin/News.php';
        require __DIR__ . '/admin/Programs.php';
        require __DIR__ . '/admin/JoinUs.php';
        require __DIR__ . '/admin/Donate.php';
        require __DIR__ . '/admin/UserJoin.php';
        require __DIR__ . '/admin/Account.php';
    });

<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ProfileController;
use App\http\controllers\admin\ProjectController;
use App\http\controllers\admin\TechnologyController;
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
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, "index"])->name('dashboard');

Route::get('/homePage', function () {
    return view('homePage');
    
})->middleware(['auth', 'verified'])->name('homePage');

Route::resource("admin/projects", ProjectController::class)->middleware(["auth", "verified"])->name("admin", "dashboard");

Route::resource("admin/technologies", TechnologyController::class)->middleware(["auth", "verified"])->name("admin", "dashboard");

/*
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
*/

require __DIR__.'/auth.php';
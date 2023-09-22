<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SellerController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\StateController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\UnitController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

require __DIR__.'/auth.php';
Route::middleware('auth')->group(function() {
    Route::get('/', function () { return view('app'); })->name('AdminLayout'); 
    if (request()->expectsJson()) { 
        Route::put('users/update-status', [UserController::class, 'updateStatus']);
    Route::resource('/users',UserController::class);
    Route::resource('/settings',SettingController::class);
    Route::resource('/cities',CityController::class);
    Route::put('states/update-status', [StateController::class, 'updateStatus']);
    Route::post('states/add-city', [StateController::class, 'addCity']);
    Route::resource('/states',StateController::class);
    Route::resource('/unit',UnitController::class);
    Route::resource('/sub-category',SubCategoryController::class);
    Route::resource('/category',CategoryController::class);
    Route::put('products/update-status', [ProductController::class, 'updateStatus']);
    Route::resource('/products',ProductController::class);
    Route::resource('/seller',SellerController::class);
    Route::fallback(function () { return redirect('/'); });

    }else {
        Route::fallback(function () {return view('app');  });
    }
    

});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

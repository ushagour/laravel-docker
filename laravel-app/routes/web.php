<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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


Route::redirect('/', '/login');
Auth::routes(['register' => false]);


Route::group(['middleware' => ['auth']], function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/search', [App\Http\Controllers\HomeController::class, 'search'])->name('search');
    Route::resource('users', App\Http\Controllers\UserController::class);
    Route::get('/profile', [App\Http\Controllers\UserController::class, 'profile'])->name('profile');
    Route::post('/profile/upload', [App\Http\Controllers\UserController::class, 'upload'])->name('profile.upload');
    Route::resource('asset', App\Http\Controllers\AssetController::class);
    Route::resource('stock', App\Http\Controllers\StockController::class);
    Route::resource('team', App\Http\Controllers\TeamController::class);
    Route::resource('transactions', App\Http\Controllers\TransactionController::class);
    Route::post('transactions/{stock}/storeStock',  [App\Http\Controllers\TransactionController::class, 'storeStock'])->name('stock.addAssetToStock');
    Route::resource('roles', App\Http\Controllers\RolesController::class);
    Route::resource('permissions', App\Http\Controllers\PermissionsController::class);
});

Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
        if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
            // Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
            Route::post('password', [App\Http\Controllers\Auth\ChangePasswordController::class, 'update'])->name('password.update');
        }



    
    });

    // Route::post('/tokens/create', function (Request $request) {
    //     $token = $request->user()->createToken($request->token_name);
     
    //     return ['token' => $token->plainTextToken];
    // });
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

<?php

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
/*
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
*/

Route::group(['namespace' => 'App\Http\Controllers'], function()
{
    /**
     * Home Routes
     */
    Route::get('/', 'HomeController@index')->name('home.index');

    Route::group(['middleware' => ['guest']], function() {
        /**
         * Register Routes
         */
        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');

        /**
         * Login Routes
         */
        Route::get('/login', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@login')->name('login.perform');

    });

    Route::group(['middleware' => ['auth', 'permission']], function() {

        /*
         * proceduras routes
         */
        Route::get('/proceduras', 'App\Http\Controllers\ProceduraController@index')->name('proceduras.index');
        Route::get('/proceduras/create', 'App\Http\Controllers\ProceduraController@create')->name('proceduras.create');
        Route::post('/proceduras', 'App\Http\Controllers\ProceduraController@store')->name('proceduras.store');
        Route::get('/proceduras/{procedura}/edit', 'App\Http\Controllers\ProceduraController@edit')->name('proceduras.edit');
        Route::put('/proceduras/{procedura}', 'App\Http\Controllers\ProceduraController@update')->name('proceduras.update');
        Route::patch('/proceduras/{procedura}', 'App\Http\Controllers\ProceduraController@update');
        Route::delete('/proceduras/{procedura}', 'App\Http\Controllers\ProceduraController@destroy')->name('proceduras.destroy');

        Route::get('/proceduras/{nfirma}/{procedura}/firma', 'App\Http\Controllers\ProceduraController@firmaProcedura')->name('proceduras.firma');
        Route::post('/proceduras/{nfirma}/{procedura}/firmaupdate', 'App\Http\Controllers\ProceduraController@firmaProceduraUpdate')->name('proceduras.firmaupdate');


        /**
         * Logout Routes
         */
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');

        /**
         * User Routes
         */
        Route::group(['prefix' => 'users'], function() {
            Route::get('/', 'UsersController@index')->name('users.index');
            Route::get('/create', 'UsersController@create')->name('users.create');
            Route::post('/create', 'UsersController@store')->name('users.store');
            Route::get('/{user}/show', 'UsersController@show')->name('users.show');
            Route::get('/{user}/edit', 'UsersController@edit')->name('users.edit');
            Route::patch('/{user}/update', 'UsersController@update')->name('users.update');
            Route::delete('/{user}/delete', 'UsersController@destroy')->name('users.destroy');
        });

        Route::resource('roles', RolesController::class);
        Route::resource('permissions', PermissionsController::class);
    });
});

require __DIR__.'/auth.php';

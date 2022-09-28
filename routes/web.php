<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PostController;
use App\Http\Middleware\Authenticate;

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

// Pagina di Benvenuto

Route::get('/', function () {
    return view('welcome');
});

// Qui vengono gestite tutte le rotte per l'autenticazione

Auth::routes();

// Aggiungiamo ->middleware('auth') per proteggere la rotta
// Aggiungiamo ->prefix('admin') per fissare la base della URI
// Aggiungiamo ->name('admin.') per fissare la base della rotta
// Aggiungiamo ->namespace('Admin') per fissare il namespace

Route::middleware('auth')->prefix('admin')->namespace('Admin')->name('admin.')->group( function(){

    // Tutte le rotte dei posts

    Route::resource('posts','PostController');

    // Tutte le rotte delle categorie

    Route::resource('categories','CategoryController');

    // Redirect verso il page not found dall'Admin

    Route::get('{any}', function(){
        abort('404');
    })->where('any','.*');
});


Route::get('/home', 'HomeController@index')->name('home');

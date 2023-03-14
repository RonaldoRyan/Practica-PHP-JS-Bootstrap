<?php

use App\Http\Controllers\ImgController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use GuzzleHttp\Middleware;
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
    return view('index');
})->name('index');


// registrar nuevo usario
// register new user
Route::post('/registro',[LoginController::class, 'register'])->name('register');

// iniciar sesion
// login
Route::post('/sesion',[LoginController::class, 'login'])->name('login');


//pagina a mostrar cuando el usario esta registrado(espacio de usario)
// home page for users
Route::get('/iniciar-sesion',[LoginController::class, 'login'])->name('home');






// salir de la pagina principal/cerrar sesion
// close the session
Route::post('logout', [LoginController::class, 'logout'])->name('logout');


// vista de pedido.blade.php(formulario de compra)
// pedido.blade.php view (purchase form)
Route::get('/pedido', [OrderController::class, 'pedido'])->name('pedido')->middleware('auth');;

// panel de edicion y eliminacion(info.blade.php)
// edit and delete panel(info.blade.php)
Route::get('/records', [InfoController::class, 'show'])->name('records')->middleware('auth');

// vista de img.blade.php

Route::get('/imagenes', [ImgController::class, 'img'])->name('img');

// vista de el detalle de compra
Route::post('pedido', [OrderController::class, 'store'])->name('store');

// guardado de datos
Route::post('/guardar-datos', [OrderController::class, 'guardarDatos'])->name('guardarDatos');

// inserccion de datos en la pagina show donde podemos actualizar y eliminar registros
Route::get('/pedido/{parametro}', [OrderController::class, 'show'])->where(['parametro' => '[A-Za-z]+'])->name('show');

// actualizar
Route::put('/pedido/{id}', [InfoController::class, 'update'])->name('pedido.update');

// eliminar
Route::delete('/pedido/{id}', [InfoController::class, 'destroy'])->name('pedido.destroy');











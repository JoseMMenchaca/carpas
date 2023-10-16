<?php

use App\Http\Controllers\CarpaController;
use App\Http\Controllers\ComunarioController;
use App\Http\Controllers\HortalizaController;
use App\Http\Controllers\PageController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('admin')->group(function () {
    Route::resource('carpas',CarpaController::class);
    Route::resource('comunarios',ComunarioController::class);


    Route::prefix('reportes')->group(function(){
        Route::get('/carpas',[CarpaController::class,'entregaPdf'])->name('carpas.report');
    });
});
Route::prefix('datos')->group(function(){
    Route::get('/',[ComunarioController::class,'comunario'])->name('comunario.index.busqueda');
    Route::post('/',[ComunarioController::class, 'buscarComunario'])->name('comunario.busqueda');
    Route::get('/{ci}/siembra',[PageController::class,'siembra'])->name('siembra.form');
    Route::get('/{ci}/cosecha',[PageController::class,'cosecha'])->name('cosecha.index');
    Route::get('/{ci}/uso',[PageController::class,'uso'])->name('usos.index');

    Route::post('/{ci}/siembra',[PageController::class,'siembraCreate'])->name('siembra.create');
    Route::post('/{ci}/cosecha',[PageController::class,'cosechaCreate'])->name('cosecha.create');
    Route::post('/{ci}/uso',[PageController::class,'usoCreate'])->name('usos.create');

});

Route::post('/buscarvariedad',[HortalizaController::class,'buscarVariedad'])->name('hortalizas.buscar');
require __DIR__.'/auth.php';

<?php

use App\Http\Controllers\ProdutoController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function(){
    Route::get('/produtos',function(){
        return view('produtos');
    })->name('produtos');

   Route::get('/produto/{id}',[
       ProdutoController::class,
       'show'
   ])->name('show');

   Route::get('/produto',[
       ProdutoController::class,
       'create'
   ])->name('produto.create');

   Route::post('/produto',[
       ProdutoController::class,
       'store'
   ]);

   Route::get('/produto/{id}/edit',[
       ProdutoController::class,
       'edit'
   ])->name('edit');

   Route::post('/produto/{id}/update',[
       ProdutoController::class,
       'update'
   ])->name('update');

   Route::get('/produto/{id}/delete',[
       ProdutoController::class,
       'delete'
   ])->name('delete');

   Route::post('/produto/{id}/remove',[
       ProdutoController::class,
       'remove'
   ])->name('remove');
});





require __DIR__.'/auth.php';

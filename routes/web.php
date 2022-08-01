<?php

use App\Http\Controllers\HomeController;
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


Route::get('/ola',function(){
    echo "Olá Mundo!!";
});

Route::get('/aloControl',
    [HomeController::class,'index']);

Route::get('/produto',
 [ProdutoController::class,'index']);

Route::get('/produto/{id}',[
    ProdutoController::class,'show']);

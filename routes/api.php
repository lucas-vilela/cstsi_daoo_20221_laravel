<?php

use App\Http\Controllers\Api\FornecedorController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\ProdutoController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/token',
    function (Request $request) {
    return $request->user();
});

//http://dominio.com:8080/api/produto/
Route::get('produto', [ProdutoController::class, 'index']);
Route::get('produto/{id}', [ProdutoController::class, 'show']);
Route::post('produto', [ProdutoController::class, 'store']);
Route::put('produto/{id}', [ProdutoController::class, 'update']);
Route::delete('produto/{id}', [ProdutoController::class, 'remove']);

//Artisan - para listar as rotas de fornecedores
//Linux|Mac: php artisan route:list | grep fornecedores
//Windows (powershell): php artisan route:list | findStr 'fornecedores'

Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::get('fornecedores/{fornecedor}/produtos', [
        FornecedorController::class,
        'produtos'
    ]);

    Route::get('fornecedores/{fornecedor}', [FornecedorController::class, 'show']);

    Route::group(['middleware'=>['ability:is_admin']],function(){
        Route::post('fornecedores', [
            FornecedorController::class, 'store'
        ]);
        Route::put('fornecedores/{fornecedor}', [
            FornecedorController::class, 'update'
        ]);
        Route::delete('fornecedores/{fornecedor}', [
            FornecedorController::class, 'delete'
        ]);
    });

    Route::post('logout',[LoginController::class,'logout']);
});

Route::get('fornecedores', [FornecedorController::class, 'index']);
Route::apiResource('user', UserController::class);
Route::post('login', [LoginController::class, 'login'])->name('login');

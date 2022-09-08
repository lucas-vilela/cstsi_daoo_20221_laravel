<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index()
    {
        return response()->json(Produto::all());
    }

    public function show($id)
    {
        try{
            return response()->json(Produto::findOrfail($id));
        }catch(\Exception $error){
            $responseError = [
                'Erro'=>"O produto com id:$id não foi encontrado!",
                'Exception'=>$error->getMessage()
            ];
            $statusHttp = 404;
            return response()->json($responseError,$statusHttp);
        }
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Produto;
use Exception;
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

    public function store(Request $request)
    {
        try{
            $newProduto = $request->all();
            $newProduto['importado'] = $request->importado? true:false;
            $storedProduto = Produto::create($newProduto);
            return response()->json([
                'msg'=>'Produto inserido com sucesso!',
                'produto'=>$storedProduto
            ]);
        }catch(\Exception $error){
            $responseError = [
                'Erro'=>"Erro ao inserir novo produto!",
                'Exception'=>$error->getMessage()
            ];
            $statusHttp=404;
            return response()->json($responseError, $statusHttp);
        }
    }


    public function update(Request $request,$id)
    {
        try{
            $newProduto = Produto::findOrfail($id);
            $newProduto->update($request->all());
            return response()->json([
                'msg'=>'Produto atualizado com sucesso!',
                'produto'=>$newProduto
            ]);
        }catch(\Exception $error){
            $responseError = [
                'Erro'=>"Erro ao atualizar novo produto!",
                'Exception'=>$error->getMessage()
            ];
            $statusHttp=404;
            return response()->json($responseError, $statusHttp);
        }
    }

    public function remove($id)
    {
        try{
            if(Produto::findOrfail($id)->delete())
                return response()->json([
                    "msg"=>"Produto com id:$id removido!"
                ]);
            else throw new Exception("Erro ao deletar produto com id:$id.");
        }catch(\Exception $error){
            $responseError = [
                'Erro'=>"O produto com id:$id não foi removido!",
                'Exception'=>$error->getMessage()
            ];
            $statusHttp = 500;
            return response()->json($responseError,$statusHttp);
        }
    }
}

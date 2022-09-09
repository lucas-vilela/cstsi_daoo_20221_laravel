<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Fornecedor;
use Exception;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    private $fornecedor;
    public function __construct(Fornecedor  $fornecedor)
    {
        $this->fornecedor = $fornecedor;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->fornecedor->all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            return response()->json([
                'msg'=>'Fornecedor inserido com sucesso!',
                'fornecedor'=>Fornecedor::create($request->all())
            ]);
        }catch(\Exception $error){
            $responseError = [
                'Erro'=>"Erro ao cadastrar novo Fornecedor!",
                'Exception'=>$error->getMessage()
            ];
            $statusHttp=401;
            return response()->json($responseError, $statusHttp);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Fornecedor $fornecedor)
    {
        return $fornecedor->load('produtos');//find($id)->with('relacao')->get()
    }

    public function produtos(Fornecedor $fornecedor)
    {
        return $fornecedor->load('produtos')->produtos;//find($id)->with('relacao')->get()
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fornecedor $fornecedor)
    {
        try{
            $fornecedor->update($request->all());
            return response()->json([
                "msg"=>"Fornecedor atualizado!",
                "Fornecedor"=>$fornecedor
            ]);
        }catch(\Exception $error){
            $responseError = [
                'Erro'=>"Erro ao atualizar Fornecedor!",
                'Exception'=>$error->getMessage()
            ];
            $statusHttp=404;
            return response()->json($responseError, $statusHttp);
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fornecedor $fornecedor)
    {
        try{
            if($fornecedor->delete())
                return response()->json([
                    "msg"=>"Fornecedor excluido.",
                    "fornecedor"=>$fornecedor
                ]);
            else throw new \Exception("Erro não detectado, tente mais tarde!");
        }catch(\Exception $error){
            $responseError = [
                'Erro'=>"Erro ao deletar o fornecedor!",
                'Exception'=>$error->getMessage()
            ];
            $statusHttp=404;
            return response()->json($responseError, $statusHttp);
        }
    }
}

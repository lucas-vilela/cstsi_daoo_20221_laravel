<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    protected $produto;

    public function __construct()
    {
        $this->produto = new Produto();
    }

    public function index()
    {
        $listProdutos = $this->produto->all();
        return view('produtos', ['produtos' => $listProdutos] );
    }

    public function show($id)
    {
        return view('show_produto', [
            'produto' => Produto::find($id)
        ]);
    }

    public function create()
    {
        return view('produto_create');
    }

    public function store(Request $request)
    {
        try {
            $produto = $request->all();
            $produto['importado'] = $request->importado ? true : false;
            Produto::create($produto);
            return redirect('produtos');
        } catch (Exception $error) {
            return view(
                'produto_create',
                ['msg' => 'Erro ao iserir!']
            );
        }
    }

    public function edit($id)
    {
        return view('produto_edit', [
            'produto' => Produto::find($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $updatedProduto = $request->all();
        $updatedProduto['importado'] =
            $request->importado ? true : false;
        if (!Produto::find($id)->update($updatedProduto))
            return view(
                'produto_edit',
                ['msg' => "Erro ao atualizar produto $id !!!"]
            );
        return redirect('/produtos');
    }


    public function delete($id)
    {
        return view('produto_remove', [
            'produto' => Produto::find($id)
        ]);
    }

    public function remove(Request $request,$id)
    {
        if($request->id){
            if (!Produto::destroy($request->id))
            return view('produto_remove', [
                'produto' => Produto::find($id),
                'msg'=>'Erro ao excluir o produto!'
            ]);
        return redirect('/produtos');
        }else{
            return view('produto_remove', [
                'produto' => Produto::find($id),
                'msg'=>'Erro ao deletar o produto!'
            ]);
        }
    }
}

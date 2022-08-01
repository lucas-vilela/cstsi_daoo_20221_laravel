<?php

namespace App\Http\Controllers;

use App\Models\Produto;
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
        // return response()->json($listProdutos);
        return view('produtos',
            ['produtos'=>$listProdutos]
        );
    }

    public function show($id)
    {
        return view('show_produto',[
            'produto'=>Produto::find($id)
        ]);
    }
}

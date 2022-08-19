<?php

namespace App\Http\Livewire;

use App\Models\Produto;
use Livewire\Component;

class Products extends Component
{

    public $produtos;
    public $orderAsc;

    public $nome;
    public $descricao;
    public $quantidade;
    public $preco;
    public $importado;

    public function mount(){
        $this->produtos = Produto::all();
        $this->orderAsc = TRUE;
    }

    public function reverter(){
        $this->produtos=$this->produtos->reverse();
    }

    public function orderByName(){
        $this->orderBy('nome');
    }

    public function orderByPrice(){
        $this->orderBy('preco');
    }

    public function orderBy($column){
        $this->produtos = Produto::orderBy($column,$this->orderAsc?'asc':'desc')->get();
        $this->orderAsc = !$this->orderAsc;
    }

    public function save(){
        $produto = [
            "nome"=>$this->nome,
            "descricao"=>$this->descricao,
            "preco"=>$this->preco,
            "qtd_estoque"=>$this->quantidade,
            "importado"=>$this->importado?true:false
        ];
        Produto::create($produto);
        $this->produtos = Produto::all()->reverse();
    }

    public function render()
    {
        return view('livewire.products');
    }
}

<?php

namespace App\Http\Livewire;

use App\Models\Produto;
use Livewire\Component;

class Products extends Component
{

    public $produtos;
    public $orderAsc;

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

    public function render()
    {
        return view('livewire.products');
    }
}

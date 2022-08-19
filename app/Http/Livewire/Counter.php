<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{

    public $count;

    public function mount(){
        $this->count = 0;
    }

    public function add(){
        $this->count+=1;
    }

    public function sub(){
        $this->count-=1;
    }

    public function render()
    {
        return view('livewire.counter');
    }
}

<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;

class ProductSearch extends Component
{
    public $search;

    protected $listeners = [
      'searchproduct' => 'searchProduct'  
    ];


    public function searchProduct()
    {
        $this->emit("sh",$this->search);
    }
    
    public function render()
    {
        return view('livewire.product.product-search');
    }
}

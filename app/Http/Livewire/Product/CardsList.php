<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use Livewire\Component;

class CardsList extends Component
{
    public function render()
    {
        
        return view('livewire.product.cards-list');
    }
}

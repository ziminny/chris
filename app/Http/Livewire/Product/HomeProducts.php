<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use Livewire\Component;

class HomeProducts extends Component
{
    public function index()
    {
        $products = Product::paginate(10);
        return view('livewire.product.index' , compact('products'));
    }
}

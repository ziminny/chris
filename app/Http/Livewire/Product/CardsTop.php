<?php

namespace App\Http\Livewire\Product;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class CardsTop extends Component
{


    public function render()
    {

        $items = [
            [
              'title' => 'Categoria',
              'total' => Category::all()->count(),
              'icon' => 'fas fa-list'
            ],
            [
                'title' => 'Produtos',
                'total' => Product::all()->count(),
                'icon' => 'fab fa-product-hunt'
            ],
            [
                'title' => 'Carrinho',
                'total' => 1,
                'icon' => 'fas fa-cart-arrow-down'
              ]
        ];

        return view('livewire.product.cards-top',['items' => $items]);
    }
}

<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;

class CardsTop extends Component
{


    public function render()
    {

        $items = [
            [
              'title' => 'Categoria',
              'total' => 15,
              'icon' => 'fas fa-list'
            ],
            [
                'title' => 'Produtos',
                'total' => 132,
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

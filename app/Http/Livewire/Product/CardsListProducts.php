<?php

namespace App\Http\Livewire\Product;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class CardsListProducts extends Component
{
    use WithPagination;
    public $search;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    protected $listeners = [
        'sh' => 'search'
    ];

    public function search($arg) {
        $this->search = $arg;
    }


    public function render()
    {
        $products = Product::where("name",'like','%'.$this->search.'%')->orderBy('name')->paginate(9);
        $categories = Category::all();
        $cat = Category::find(1);
       // dd($products[1]->caregories);
        
        return view('livewire.product.cards-list-products',[ 'products' => $products ]);
    }
}

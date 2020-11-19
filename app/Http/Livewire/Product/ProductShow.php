<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use App\Models\User;
use Livewire\Component;

class ProductShow extends Component
{

    public $product;
    public $user;
    public $productCost;
    public $productSale;

    public function render()
    {
        return view('livewire.product.product-show');
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function mount()
    {
        
        $this->productSale =  number_format($this->product->sale_price,2,".","");
        $this->productCost = number_format($this->product->cost_price,2,".","");
      

    }
    public function setNewName()
    {
        dd($this->name);
    }

    public function removeCategory($id)
    {
        $this->product->categories()->detach($id);
       //Category::destroy($category);
    }

    public function show(Product $product)
    {
        $user = User::where("id",$product->user_id)->first();
        return view('livewire.product.product-show-livewire',compact('product','user'));
    }
}

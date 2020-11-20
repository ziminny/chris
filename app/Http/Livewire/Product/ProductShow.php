<?php

namespace App\Http\Livewire\Product;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProductShow extends Component
{

    public $product;
    public $user;
    public $productCost;
    public $productSale;
    public $amount;
    public $description;
    public $name;
    public $confirmAddCategory = false;
    public $categories;

    protected $listeners = [
        'refresh' => '$refresh'
    ];

    protected $rules = ['productCost' => 'required'];

    public function render()
    {
        return view('livewire.product.product-show');
    }

    public function mount()
    {
   
        $this->productSale =  number_format($this->product->sale_price,2,".","");
        $this->productCost = number_format($this->product->cost_price,2,".","");
        $this->amount = $this->product->amount;
        $this->description = $this->product->description;
        $this->name = $this->product->name;
        
      

    }
    public function setNewName()
    {
        dd($this->name);
    }

    public function addCategory($productId)
    {
        $this->confirmAddCategory = true;
    }


    public function removeCategory($id)
    {
        $this->product->categories()->detach($id);
        $this->emit("refresh"); 
    }

    public function show(Product $product)
    {
        $user = User::where("id",$product->user_id)->first();
        // $categories = (new Category())->whereNoActualProduct(1)->get();
        $categories = Category::whereHas('whereNoActualProduct', function($query) use($product) {
            
            return $query->where('product_id', '!=', $product->id);
        })->get();
       
        
        return view('livewire.product.product-show-livewire',compact('product','user','categories'));
    }

    public function save()
    {
        $this->validate([
            'productCost' => 'required|numeric',
            'productSale' => 'required|numeric',
            'amount' => 'required|integer',
            'name' => 'required'
            ]);

            Product::where('id',$this->product->id)->update([
                'name' => $this->name,
                'cost_price' => $this->productCost,
                'sale_price' => $this->productSale,
                'amount' => $this->amount,
                'description' => $this->description,
                'user_id' => Auth::user()->id,
            ]);

    }
}

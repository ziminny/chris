<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Product;
use DB;

class Create extends Component
{

    public $name;
    public $salePrice;
    public $costPrice;
    public $description;
    public $amount;
    public $images = [];

    protected $rules = [
        'name' => 'required|min:2',
        'salePrice' => 'required|numeric',
        'costPrice' => 'required|numeric',
        'amount' => 'required|numeric',
        'images.*' => 'image'
    ];

    protected $validationAttributes = [
        'salePrice' => 'preço de venda',
        'costPrice'=> 'preço de custo',
        'amount' => 'quantidade',
        'images.*' => 'imagens'
    ];

    use WithFileUploads;

    public function render()
    {
        return view('livewire.product.create');
    }

    public function create()
    {
        return view('livewire.product.create-livewire');
    }

    public function updated()
    {
        $this->validate();  
    }

    public function store()
    {


        $this->validate();
       DB::transaction(function () {
        $product = Product::create([
            'name' => $this->name,
            'sale_price' => $this->salePrice,
            'cost_price' => $this->costPrice,
            'description' => $this->description,
            'amount' => $this->amount
        ]);

    
        if($this->images){
            foreach ($this->images as $key => $image) {
                $arrayImages = $image->store('products','public');
                $product->images()->create(['name' => $arrayImages]);
            }
            
        }

        session()->flash("message","Produto cadastrado com sucesso !");
        return redirect()->route("products.index");

        
       });
      
    }
}

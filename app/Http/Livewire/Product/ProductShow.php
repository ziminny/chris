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
    public $categorias;



    /**
     *  recarrega os dados na tela novamente
     */
    protected $listeners = [
        'refresh' => '$refresh'
    ];

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

    /**
     *  abre o modal para adicionar uma nova categoria
     */
    public function addCategory()
    {  
        $this->confirmAddCategory = true;
        $this->emit("refresh");      
    }

    public function calcelAddCategory()
    {
        $this->confirmAddCategory = false;
        
        $this->emit("refresh");
        $this->resetValidation();
    }

    /**
     *  modal para adicionar uma nova caregoria
     */
    public function addCategoryModal()
    {
        $this->validate([
            'categorias' => 'required'
        ]);
         $this->product->categories()->attach([$this->categorias]);    
         
         $this->categorias = "";
         $this->emit("refresh");   
         $this->confirmAddCategory = false;
    }

    /**
     *  remove uma categoria
     */
    public function removeCategory($id)
    {
       // dd($this->product->categories());
       
        $this->product->categories()->detach([$id]);
    

        $this->emit("refresh");
        
         
    }



    public function show(Product $product)
    {
        $this->product = $product;
        $user = User::where("id",$product->user_id)->first();
        return view('livewire.product.product-show-livewire',['product' => $product,'user' => $user]);
    }

    public function updated()
    {
        $this->validate([
            'productCost' => 'required|numeric',
            'productSale' => 'required|numeric',
            'amount' => 'required|integer',
            'name' => 'required'
            ]);
    }

    /**
     *  salva os dados 
     */
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
            $this->dispatchBrowserEvent("save-product");
            $this->emit("refresh");
    }
}

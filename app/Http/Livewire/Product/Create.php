<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Product;
use DB;

class Create extends Component
{

    /**
    * necessário para adicionar fotos 
    */
    use WithFileUploads;
    
    /**
    *  Nome do Produto
    * 
    *  @var string
    */
    public $name;

    /**
    *  Preço de venda
    * 
    *  @var float
    */
    public $salePrice;

    /**
    * Preço de custo 
    * 
    *  @var float
    */
    public $costPrice;

    /**
    *  Descrição
    * 
    *  @var string
    */
    public $description;

    /**
    *  Quantidade
    * 
    *  @var int
    */
    public $amount;

    /**
     *  Imagens
     * 
     *  @var array
     */
    public $images = [];

    /**
    *  Regras de validação 
    *
    *  @var array
    */
    protected $rules = [
        'name' => 'required|min:2',
        'salePrice' => 'required|numeric',
        'costPrice' => 'required|numeric',
        'amount' => 'required|integer',
        'description' => 'required',
        'images.*' => 'image',
    ];

    /**
    *  Apelido dos atributos 
    * 
    *  @var array
    */
    protected $validationAttributes = [
        'salePrice' => 'preço de venda',
        'costPrice'=> 'preço de custo',
        'amount' => 'quantidade',
        'description' => 'descrição',
        'images.*' => 'imagens',
    ];



    public function render()
    {
        return view('livewire.product.create');
    }

    public function create()
    {
        return view('livewire.product.create-livewire');
    }

    /**
    * Validação enquanto digita 
    */
    public function updatedName()
    {
        $this->validate([
            'name' => 'required|min:3'
        ]);  
    }

    /**
    * Validação enquanto digita 
    */
    public function updatedSalePrice()
    {
        $this->validate([
            'salePrice' => 'required|numeric'
        ]);  
    }

    /**
    * Validação enquanto digita 
    */
    public function updatedCostPrice()
    {
        $this->validate([
            'costPrice' => 'required|numeric'
        ]);  
    }


    /**
    * Validação enquanto digita 
    */
    public function updatedAmount()
    {
        $this->validate([
            'amount' => 'required|integer'
        ]);  
    }

    /**
    * Validação enquanto digita 
    */
    public function updateDescription()
    {
        $this->validate([
            'description' => 'required|integer'
        ]);  
    }

    /**
    *  Cria o produto com as imagens
    */
    public function store()
    {
       $this->validate();

       DB::transaction(function () {
            $product = $this->createProduct();
            $product->images()->createMany($this->saveImageDisk());
       });

       session()->flash("message","Produto cadastrado com sucesso !");
       return redirect()->route("products.index"); 
    }

    /**
     *  @return Product
     */
    private function createProduct()
    {
        return Product::create([
            'name' => $this->name,
            'sale_price' => $this->salePrice,
            'cost_price' => $this->costPrice,
            'description' => $this->description,
            'amount' => $this->amount,
            'user_id' => auth()->user()->id
        ]);
    }

    /**
    *  [
    *    'name' => 'products/hdhshshdspdsdjksd.extensao,
    *    'name' => 'products/dsdsdpkpdskdsdksk.extensao,
    *  ] 
    * 
    * @return array 
    */
    private function saveImageDisk()
    {
        $arrayImages = [];
        if($this->images){
            foreach ($this->images as $image) {
                $arrayImages[] = [ 
                      'name' => $image->store('products','public')
                ];
            }   
        }
        return $arrayImages;
    }
}

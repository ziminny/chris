<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{

    public $name;
    public $salePrice;
    public $costPrice;
    public $description;
    public $amount;
    public $images = [];

    use WithFileUploads;

    public function render()
    {
        return view('livewire.product.create');
    }

    public function create()
    {
        return view('livewire.product.create-livewire');
    }

    public function store()
    {
        dd($this->images);
    }
}

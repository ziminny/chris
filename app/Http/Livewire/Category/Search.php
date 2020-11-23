<?php

namespace App\Http\Livewire\Category;

use Livewire\Component;
use App\Models\Category;

class Search extends Component
{
    public $search;
    public $showModalCategory = false;
    public $categoria;

    protected $listeners = [
        'searchCategory' => 'search'
    ];

    public function addCategoryModal()
    {
        $this->validate([
            'categoria' => 'required|unique:categories,name'
        ]);
        Category::create([
            'name' => $this->categoria
        ]);
        $this->showModalCategory = false;
        $this->categoria = "";
        
    }

    public function calcelModal()
    {
        $this->categoria = "";
        $this->showModalCategory = false; 
        
    }

    public function addCategory()
    {
        $this->showModalCategory = true;
        //$this->dispatchBrowserEvent('clear-input',[$this->categoria]);
    }

    public function search()
    {
        $this->emit('shc',$this->search);
    }
    public function render()
    {
        return view('livewire.category.search');
    }
}

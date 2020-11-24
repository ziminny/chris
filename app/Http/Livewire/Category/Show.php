<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use DB;

class Show extends Component
{
    public $confirmDeleteCategory = false;
    public $categoryId;
    public $display;
    public $confirmEditCategory = false;
    public $search;
    /**
     *  Nome da categoria
     */
    public $categoria;

    protected $listeners = [
        'shc' => 'search', 
        'refresh' => '$refresh'
    ];

    public function search($arg)
    {
        $this->search = $arg;
        $this->display = 'block';
    }
    public function render()
    {
        $categories = Category::where("name",'like','%'.$this->search.'%')
            ->get();
        return view('livewire.category.show',compact('categories'));
    }


    public function calcelModalEdit()
    {
        $this->confirmEditCategory = false;
        $this->emit("refresh");
        $this->resetValidation();
    }



    public function editCategory($id)
    {
        $this->dispatchBrowserEvent('focus-input-edit');
        $this->confirmEditCategory = true;
        $this->display = 'block';
        $this->categoryId = $id;
        
        $this->categoria = Category::where("id",$id)->first()->name;
       
        
    }
    public function editCategoryModal()
    {
        $this->validate([
            'categoria' => 'required|unique:categories,name,'.$this->categoryId
        ]);
        Category::where("id",$this->categoryId)->update([
            'name' => $this->categoria
        ]);
        $this->confirmEditCategory = false;
    }






    public function deleteCategory($categoryId)
    {
        $this->confirmDeleteCategory = true;
        $this->categoryId = $categoryId;
        $this->display = 'block';
        

    }

    public function confirmDeleteCategory()
    {

       Category::destroy([
           'id' => $this->categoryId
       ]);
    $this->confirmDeleteCategory = false;
    }
}

<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class Show extends Component
{
    public $confirmDeleteCategory = false;
    public $categoryId;
    public $display;
    public function render()
    {
        $categories = Category::all();
        return view('livewire.category.show',compact('categories'));
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

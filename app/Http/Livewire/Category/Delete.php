<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
use Livewire\Component;

class Delete extends Component
{
   
   /**
    * Categoria atual 
    *
    *  @var Category
    */
    public $category;

    /**
     *  Id da categoria atual 
     * 
     *  @var int
     */
    public $categoryId;

    /**
     *  Modal 
     * 
     *  @var boolean
     */
    public $confirmDeleteCategory = false;
    

    public function render()
    {
        return view('livewire.category.delete');
    }

    /**
     *  Abre o modal 
     */
    public function deleteCategory($categoryId)
    {
        $this->confirmDeleteCategory = true;
        $this->categoryId = $categoryId;
    }
    
    /**
     * Botão confirma do modal
     */
    public function confirmDeleteCategory()
    {
        $this->delete();
        // Recarrega a pagina livewire.category.show
        $this->emit("refreshShow");
        $this->confirmDeleteCategory = false;
    }

    /**
     *  Botão cancecla do modal
     */
    public function calcelModal()
    {
        // Esconde o modal
        $this->confirmDeleteCategory = false;
    }

    /**
     *  Deleta a categoria
     */
    private function delete()
    {
        Category::destroy([
            'id' => $this->categoryId
        ]);
    }
}

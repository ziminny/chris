<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
use Livewire\Component;

class Edit extends Component
{  
    /**
    *  @var Category
    */
    public $categoria;
    
    /**
     * @var int 
     */
    public $categoryId;

    /**
     *  @var boolean
     */
    public $confirmEditCategory = false;

    /**
     *  @var Category
     */
    public $category;

    public function render()
    {
        return view('livewire.category.edit');
    }

    /**
     *  Validação dos dados em tempo real
     */
    public function updated()
    {
        $this->validate($this->myRules());
    }
    
    /**
     *  Abre o modal de edição
     */
    public function editCategory($id)
    {
        // Mostra o modal
        $this->confirmEditCategory = true;
        // Pego o id atual
        $this->categoryId = $id; 
        // Pego a categoria que o usuário clicou
        $this->categoria = Category::where("id",$id)->first()->name;  
    }

    /**
     *  Quando clica no botão confirmar
     */
    public function editCategoryModal()
    {
        $this->validate($this->myRules());
        $this->editActualCategory();
        // Esconde o modal
        $this->confirmEditCategory = false;
        // Dou um refresh na página livewire.category.show
        $this->emit("refreshShow");
    }
    
    /**
     *  Quando clica no botão cancelar
     */
    public function calcelModal()
    {
        $this->confirmEditCategory = false;
        // Reset nas validações , pois quando o usuário clica em cancela e depois volta a mensagem continua
        $this->resetValidation();
    }

    /**
     *  @return array 
     *  Regras de validação 
     */
    private function myRules() :array
    {
        return [
            'categoria' => 'required|unique:categories,name,'.$this->categoryId
        ];
    }

    /**
     * Edição acontece aqui
     */
    private function editActualCategory() {
        Category::where("id",$this->categoryId)->update([
            'name' => $this->categoria
        ]);
    }
}

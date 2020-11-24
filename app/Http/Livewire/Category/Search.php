<?php

namespace App\Http\Livewire\Category;

use Livewire\Component;
use App\Models\Category;

class Search extends Component
{
    /**
     *  Input de busca
     * 
     *  @var string
     */
    public $search;

    /**
     *  Modal 
     * 
     *  @var boolean
     */
    public $showModalCategory = false;

    /**
     *  Input Categoria
     * 
     *  @var Input
     */
    public $categoria;

    /**
     * Regras da validação
     * 
     *  @var array
     */
    protected $rules = [
        'categoria' => 'required|unique:categories,name'
    ];

    /**
     *  Evento
     * 
     *  @var array
     */
    protected $listeners = [
         // Toda vez que muda de estado pego o valor do input de pesquisa keyup
        'searchCategory' => 'search',
    ];

    public function render()
    {
        return view('livewire.category.search');
    }
    
    /**
     *  Validação enquanto digita
     */
    public function updated()
    {
        $this->validate();
    }
    
    /** 
     *  Botão , adicionar do modal
     */
    public function addCategoryModal()
    {
        $this->validate();
        // Cria o usuário
        $this->create(); 
        // Esconde o modal   
        $this->showModalCategory = false;
        // Após clicar em confirmar limpa o input
        $this->categoria = "";
        // Refresh na pagina p/ aparecer o novo dado adicionado
        $this->emit("refreshShow");
        
    }

    /**
     *  Botão cancelar do modal
     */
    public function calcelModal()
    {
        // Após clicar em calcelar limpa o input
        $this->categoria = "";
        // Esconde o modal
        $this->showModalCategory = false;
        // Reset nas validações p/ nao voltar com a mensagem de erro caso o usuario click em cancelar
        $this->resetValidation();        
    }

    /**
     *  Abre o modal
     */
    public function addCategory()
    {
        $this->showModalCategory = true;
    }

    /**
     *  Envio com o emit keyup
     */
    public function search()
    {
        $this->emit('shc',$this->search);
    }
    
    /**
     *  Cria a categoria
     */
    private function create()
    {
        Category::create([
            'name' => $this->categoria
        ]);
    }
}

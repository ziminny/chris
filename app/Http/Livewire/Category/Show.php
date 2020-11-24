<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use DB;
use Livewire\WithPagination;

class Show extends Component
{


    /**
    *  Preciso segurar a tela aqui p/ nao mudar p/ produtos que é o estado inicial
    * 
    *  @var string
    */
    public $display;

    /**
     *  Captura campo de busca da classe Show
     * 
     *  @var string
     */
    public $search;
    
    /**
     *  Eventos
     * 
     *  @var array
     */
    protected $listeners = [
        // sch foi enviado da classe Show
        'shc' => 'search', 
        'refreshShow' => 'refresh'
    ];
    
    /**
     *  Sempre que o usuário digitar algo atribuo a variavel search
     */
    public function search($arg)
    {
        $this->search = $arg;
        // Seguro block para nao ir p/ none
        $this->display = 'block';
    }

    
    public function render()
    {

        $categories = Category::where("name",'like','%'.$this->search.'%')
            ->get();
        return view('livewire.category.show',compact('categories'));
    }


    
    /**
     *  Recarrega a pagina
     */
    public function refresh()
    {
        $this->emit('$refresh');
        $this->display = "block";
    }


}

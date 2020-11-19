<?php

namespace App\Http\Livewire\User;

use Livewire\Component;


class UserSearch extends Component
{
    public $search;
    protected $listeners = [
        'teste' => 'search'
    ];
    
    public function search()
    {
       $this->emit("sch",$this->search);
    }

    public function render()
    {
        
     
        return view('livewire.user.user-search');
    }
}

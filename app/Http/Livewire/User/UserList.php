<?php

namespace App\Http\Livewire\User;

use App\Models\Rule;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserList extends Component
{

    use WithPagination;


    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.user.user-list');
    }
    public function index()
    {
        
        return view("user.index");
    }

}

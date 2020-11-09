<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use Livewire\WithPagination;

class UserTable extends Component
{
    use TraitSearchForNameOrEmail;
    use WithPagination;
    public $search;

    
    public function updatingSearch()
    {
        $this->resetPage();
    }
    protected $listeners = [
        'sch' => 'search'
    ];
    
    public function search($arg)
    {
        $this->search = $arg;
    }



    public function render()
    {
       // dd($this->users());
        return view('livewire.user.user-table',['users' => $this->users($this->search)]);
    }
}

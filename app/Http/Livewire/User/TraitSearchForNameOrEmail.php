<?php


namespace App\Http\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\DB;

trait TraitSearchForNameOrEmail 
{
  
    
    private function users($search)
    {
       return DB::table('users')->where("name",'like','%'.$search.'%')
                    ->orWhere(function($query) use ($search) {
                        $query->where("email",'like','%'.$search.'%');  
                    })->paginate(7);
//        return User::where("name",'like','%'.$this->search.'%')->paginate(7);
    }
}
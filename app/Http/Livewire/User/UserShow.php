<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;

class UserShow extends Component
{


    public function show(User $user)
    {
        $user = User::where("id",$user->id)->first();
        return view("livewire.user.user-show",['user'=> $user]);
    }
}

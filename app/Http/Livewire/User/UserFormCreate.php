<?php

namespace App\Http\Livewire\User;

use App\Actions\Fortify\PasswordValidationRules;
use App\Models\Rule;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;

class UserFormCreate extends Component
{
    use PasswordValidationRules;
    public $password_confirmation;
    public $name;
    public $email;
    public $password;
    public $permission;
    public function render()
    {
        return view('livewire.user.user-form-create');
    }
    public function store()
    {
        $roles = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'password_confirmation' => 'required',
            'permission' => 'required'
        ];
        $this->validate($roles);

        DB::transaction(function () {
                    $user = User::create([
                        'name' =>$this->name,
                        'email' => $this->email,
                        'password' =>Hash::make($this->password), 
                    ]);

                    Rule::create([
                        'permission' => $this->permission,
                        'user_id' => $user->id
                    ]);    
        });

   
        session()->flash("message","Usuário cadastrado com sucesso");
        return redirect()->to("users");
    }
    public function create()
    {
        return view('livewire.user.user-create');
    }
}

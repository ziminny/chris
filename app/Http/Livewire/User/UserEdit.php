<?php

namespace App\Http\Livewire\User;

use App\Helpers\TraitLastUserAdmin;
use App\Models\Rule;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Illuminate\Validation\ValidationException;

class UserEdit extends Component
{

    use TraitLastUserAdmin;

    public User $user;
    public $name;
    public $email;
    public $permission;
    public $datas;
    public $success = true;

    protected $roles = [];

    
    public function render()
    {
        return view('livewire.user.user-edit');
    }


    public function mount() :void
    {
        $this->name = $this->user->name;
        $this->email = $this->user->email;    
    }


    public function setPermission($permission) :void
    {
        $this->permission = $permission;
    }


    public function updateProfileInformation() 
    {     
            $this->update(); 
            
            session()->flash("message","Usuário editado com sucesso !");
            return redirect()->to('/users');
    }

    public function press() :void
    {
        $this->validate($this->ruless()); 
    }
    /**
     * @return void
     */
    private function update() :void
    {
       
        DB::transaction(function () {
                $this->updateUser();
                $this->ifNoClickRadionInput();
               
        });
    }

    /**
     * @return array
     */
    private function ruless() :array
    {
        return $this->roles = [
            'name' => 'required|min:4',
            'email' =>[ 'required','email','min:6','unique:users,email,'.$this->user->id ]
            
        ];
    }

    private function containAdmin()
    {
       $this->success = false;
        if(!$this->isEmptyUserAdmin()) {
            throw ValidationException::withMessages([
                'email' => [$this->messageUserLastAdmin],
            ]);
        }
    }

    private function updateUser() :void
    {
        
        $this->user->update([
            'name' => $this->name,
            'email' => $this->email,
            'email_verified_at' => $this->user->email_verified_at,
            'password' => $this->user->password,
            'current_team_id' => $this->user->current_team_id,
            'profile_photo_path' => $this->user->profile_photo_path
        ]);
       
    }

    private function ifNoClickRadionInput() :void
    {     
            
            if($this->permission) {
                Rule::where('user_id',$this->user->id)->update(["permission" => $this->permission]);    
                $this->lastUserAdmin();
            }  
           
           
    }

    private function lastUserAdmin()
    {
       
        if($this->countAdmin()) {
            
            DB::rollback();
            
            $this->containAdmin();
            
        }
   
    }
}

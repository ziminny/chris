<?php

namespace App\Http\Livewire\User;

use App\Helpers\TraitLastUserAdmin;
use App\Models\Rule;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Laravel\Jetstream\Contracts\DeletesUsers;
use Livewire\Component;
use DB;

class UserDelete extends Component
{
    use TraitLastUserAdmin;

    public User $user;
    
    
    public function render()
    {
        return view('livewire.user.user-delete');
    }


    /**
     * Indicates if user deletion is being confirmed.
     *
     * @var bool
     */
    public $confirmingUserDeletion = false;

    /**
     * The user's current password.
     *
     * @var string
     */
    public $password = '';

    /**
     * Confirm that the user would like to delete their account.
     *
     * @return void
     */
    public function confirmUserDeletion()
    {
        $this->password = '';

        $this->dispatchBrowserEvent('confirming-delete-user');

        $this->confirmingUserDeletion = true;
    }

    /**
     * Delete the current user.
     *
     * @param  \Laravel\Jetstream\Contracts\DeletesUsers  $deleter
     * @param  \Illuminate\Contracts\Auth\StatefulGuard  $auth
     * @return void
     */
    public function deleteUser(DeletesUsers $deleter)
    {
        $this->resetErrorBag();
           
        
            if(!Hash::check($this->password, Auth::user()->password)) {
                    throw ValidationException::withMessages([
                        'password' => [__('A senha não confere !')],
                    ]);
            }
            if(!$this->isEmptyUserAdmin()) {
                throw ValidationException::withMessages([
                    'password' => [$this->messageUserLastAdmin],
                ]);
            }
           
            DB::transaction(function () use($deleter) {

                    Rule::destroy([
                        'user_id' => $this->user->id
                    ]);
                    
                    $deleter->delete($this->user->fresh());

            });

           session()->flash("message","Usuário deletado com sucesso");
           return redirect('/users');

       
    }
}

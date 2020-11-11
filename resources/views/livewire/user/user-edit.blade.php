<x-jet-form-section submit="updateProfileInformation">
    
   
    <x-slot name="title">
        {{ __('Informações do perfil') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Atualize as informações de perfil desta conta e o endereço de e-mail.') }}
    </x-slot>


    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">

                    

                <x-jet-input-error for="photo" class="mt-2" />
            </div>
        @endif

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="{{ __('Nome') }}" />
        <x-jet-input id="name" wire:model='name' wire:keyup='press' type="text" class="mt-1 block w-full"  autocomplete="name" />
        
            <x-jet-input-error for="name" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="email" value="{{ __('Email') }}" />
            <x-jet-input id="email" wire:model='email' wire:keyup='press' name="email" class="mt-1 block w-full" value="ff"/>
            <x-jet-input-error for="email" class="mt-2" />
        </div>
        

        <div class="col-span-6 sm:col-span-4 field-permission-edit">
           
                <x-jet-label for="password_confirmation" value="{{ __('Permissão') }}" />
                

                    <div class="radio-buttons-permissions-edit">
                        <div class="radio-buttons-permissions-edit-cols radio-buttons-permissions-edit-cols-salesman">
                            <x-jet-label for="email" value="{{ __('Vendedor') }}" />
                            <input type="radio" class="input1-edit" wire:click='setPermission("salesman")' name="permission" @if (UserRule::userContainRole($user)->permission == "Vendedor") checked  @endif
                            @if (UserRule::oneAdmin($user)) disabled  @endif>
                        </div>

                        <div class="radio-buttons-permissions-edit-cols radio-buttons-permissions-edit-cols-admin">
                            <x-jet-label  for="email" value="{{ __('Administrador') }}" />
                            <input  class="input2-edit" type="radio" wire:click='setPermission("admin")' name="permission" @if (UserRule::userContainRole($user)->permission == "Administrador") checked  @endif
                            @if (UserRule::oneAdmin($user)) disabled  @endif>
                        </div>

                        <div class="radio-buttons-permissions-edit-cols radio-buttons-permissions-edit-cols-inactive">
                            <x-jet-label for="email" value="{{ __('Inativo') }}" />
                            <input  class="input3-edit" type="radio" wire:click='setPermission("inactive")' name="permission" @if (UserRule::userContainRole($user)->permission == "Inativo") checked  @endif
                            @if (UserRule::oneAdmin($user)) disabled  @endif>
                        </div>
                    </div>

            
                @error('permission')
                <small class="message-error">{{$message}}</small>
            @enderror
      
        </div>

        
    </x-slot>

    <x-slot name="actions">

        {{-- <span class="user-update-success">
            {{$message}}
        </span> --}}

        <x-jet-button wire:loading.attr="disabled">
            {{ __('Salvar') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>

{{-- <script type="text/javascript">

        let updateSuccess = document.querySelector(".user-update-success");
        let formUserUpdate = document.querySelectorAll("form")

       formUserUpdate[2].addEventListener("submit",function() {
           let interval = setInterval(() => {
            updateSuccess.style.display = "inline";
            updateSuccess.style.animation = "opacityUpdateUserSuccessShow 1.5s ease"
            
           }, 150);
           setTimeout(() => {
            clearInterval(interval) 
            updateSuccess.style.animation = "opacityUpdateUserSuccessHide 1.5s ease forwards"
          }, 1000);
       })


</script> --}}


<div class="form-create-new-user">
    <form wire:submit.prevent='store'>
   
        {{-- <x-jet-validation-errors class="mb-4" /> --}}
        <div>
            <x-jet-label for="name" value="{{ __('None') }}" />
            <x-jet-input id="name" wire:model='name' class="block mt-1 w-full" type="text" />
            @error('name')
            <small class="message-error">{{$message}}</small>
        @enderror
        </div>
    
        <div class="mt-4">
            <x-jet-label for="email" value="{{ __('Email') }}" />
            <x-jet-input id="email" wire:model='email' class="block mt-1 w-full" type="email"  />
            @error('email')
            <small class="message-error">{{$message}}</small>
        @enderror
        </div>
    
        <div class="mt-4">
            <x-jet-label for="password" value="{{ __('Senha') }}" />
            <x-jet-input id="password" wire:model='password' class="block mt-1 w-full" type="password"  />
            @error('password')
                <small class="message-error">{{$message}}</small>
            @enderror
        </div>
    
        <div class="mt-4">
            <x-jet-label for="password_confirmation" value="{{ __('Confirme a senha') }}" />
            <x-jet-input id="password_confirmation" wire:model='password_confirmation' class="block mt-1 w-full" type="password"  />
            @error('password_confirmation')
            <small class="message-error">{{$message}}</small>
        @enderror
        </div>

        <div class="mt-4 field-permission-create">
            <x-jet-label for="password_confirmation" value="{{ __('Permissão') }}" />
            <select wire:model='permission' class="select-permission-create" >
                <option value="">Selecione</option>
                <option value="salesman" >Vendedor</option>
                <option value="admin">Administrador</option>
                <option value="inactive" >Inativo</option>
            </select>
            @error('permission')
            <small class="message-error">{{$message}}</small>
        @enderror
        </div>

    
        <div class="flex items-center justify-end mt-4">
    
            {{-- <button>Cadastrar</button> --}}
            <x-jet-button class="ml-4">
                {{ __('Cadastrar') }}
            </x-jet-button>
        </div>
    </form>
</div>
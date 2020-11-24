<div>
    <span class="category-edit" wire:click='editCategory({{$category->id}})'>
        <i class="far fa-edit icon-edit"></i> <span class="hide-576">editar</span>
    </span>

        {{-- MODAL EDITAR --}}
        <x-jet-dialog-modal wire:model="confirmEditCategory">
            <x-slot name="title">
                {{ __('Editar categoria') }}
            </x-slot>
        
            <x-slot name="content">
                
        
                <div class="mt-4">
                <input type="text" wire:model='categoria' value="{{$categoria}}" class="input-category-modal-edit">
                </div>
                @error('categoria')
                <span class="message-error">{{$message}}</span>
           @enderror
            </x-slot>
        
            <x-slot name="footer">
                <x-jet-secondary-button wire:click="calcelModal" wire:loading.attr="disabled">
                    {{ __('Cancelar') }}
                </x-jet-secondary-button>
        
                <x-jet-danger-button class="ml-2" wire:click="editCategoryModal" wire:loading.attr="disabled">
                    {{ __('Confirmar') }}
                </x-jet-danger-button>
            </x-slot>
        </x-jet-dialog-modal>
        {{-- FIM MODAL EDITAR --}}
</div>


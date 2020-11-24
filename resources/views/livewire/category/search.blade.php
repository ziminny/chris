<div>
    @include('components.search',['target' => 'searchCategory' , 'route' => '','btnAction' => 'Adicionar' , 'add' => 'addCategory'])
<x-jet-dialog-modal wire:model="showModalCategory">
    <x-slot name="title">
        {{ __('Adicionar nova categoria') }}
    </x-slot>

    <x-slot name="content">
        {{ __('Digite o nome da nova cateoria !') }}

        <div class="mt-4">
        <input type="text" wire:model='categoria' class="input-category-modal-edit" id="input-category">
        </div>
        @error('categoria')
            <span class="message-error">{{$message}}</span>
        @enderror
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="calcelModal" wire:loading.attr="disabled">
            {{ __('Cancelard') }}
        </x-jet-secondary-button>

        <x-jet-danger-button class="ml-2" wire:click="addCategoryModal" wire:loading.attr="disabled">
            {{ __('Adicionar') }}
        </x-jet-danger-button>
    </x-slot>
</x-jet-dialog-modal>

</div>


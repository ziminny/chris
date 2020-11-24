<div>
    <span  
        @if ($category->products->count() == 0)
            wire:click='deleteCategory({{$category->id}})'
            class="category-delete"
        @else
            class="no-category-delete"
        @endif
>
        <i class="fas fa-user-minus icon-delete"></i> 
        <span class="hide-576">deletar</span> 
</span>

    {{-- MODAL --}}
    <x-jet-confirmation-modal wire:model="confirmDeleteCategory">
        <x-slot name="title">
            Deletar Categoria
        </x-slot>
    
        <x-slot name="content">
            {{ __('Tem certeza que deseja delletar essa categoria ?') }}           
        </x-slot>
        
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="calcelModal" wire:loading.attr="disabled">
                Cancelar
            </x-jet-secondary-button>
    
            <x-jet-danger-button class="ml-2" wire:click="confirmDeleteCategory" wire:loading.attr="disabled">
                Deletar
            </x-jet-danger-button>
        </x-slot>
    </x-jet-confirmation-modal>
    {{-- FIM MODAL --}}
</div>




<div class="table-show">
    
    {{-- MODAL --}}
    <x-jet-confirmation-modal wire:model="confirmDeleteCategory">
        <x-slot name="title">
            Deletar Categoria
        </x-slot>
    
        <x-slot name="content">
            {{ __('Tem certeza que deseja delletar essa categoria ?') }}           
        </x-slot>
        
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="calcelModalEdit" wire:loading.attr="disabled">
                Cancelar
            </x-jet-secondary-button>
    
            <x-jet-danger-button class="ml-2" wire:click="confirmDeleteCategory" wire:loading.attr="disabled">
                Deletar
            </x-jet-danger-button>
        </x-slot>
    </x-jet-confirmation-modal>
    {{-- FIM MODAL --}}

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
            <x-jet-secondary-button wire:click="calcelModalEdit" wire:loading.attr="disabled">
                {{ __('Cancelar') }}
            </x-jet-secondary-button>
    
            <x-jet-danger-button class="ml-2" wire:click="editCategoryModal" wire:loading.attr="disabled">
                {{ __('Confirmar') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
    {{-- FIM MODAL EDITAR --}}

    <div class="container-categories-dynamic" style="display: {{$display ?? 'none'}}; width:95%;">
        @livewire('category.search')
       <table>
          <thead>
      <tr>
      <th><div class="home-th-gambi"><span class="table-one-img" style="background-image: url({{asset('imgs/categories/categorie.svg')}})" ></span>&nbsp; <span>Categoria</span></div></th>
      <th class="hide-576"><div class="home-th-gambi"><span class="table-two-img" style="background-image: url({{asset('imgs/categories/product.svg')}})"></span>&nbsp; Produtos</div></th>
      <th><div class="home-th-gambi"><span class="table-three-img" style="background-image: url({{asset('imgs/categories/item.svg')}})"></span>&nbsp; Ações</span></th>
      </tr>
          </thead>
          <tbody>
      
              @foreach ($categories as $category)
             
              <tr>
              <td><div class="home-th-gambi">{{$category->name}} </div></td>
              <td class="hide-576"><div class="home-th-gambi">{{$category->products->count()}}</div></td>
              <td>
                
                  <div class="home-th-gambi"> 
                     <span  @if ($category->products->count() == 0)
                     wire:click='deleteCategory({{$category->id}})'
                     class="category-delete"
                     @else
                     class="no-category-delete"
                     @endif>
                     <i class="fas fa-user-minus icon-delete"></i> <span class="hide-576">deletar</span> </span>
                     <span class="category-edit" wire:click='editCategory({{$category->id}})'><i class="far fa-edit icon-edit"></i> <span class="hide-576">editar</span></span>
                 </div>
             </td>
              
              @endforeach
           
          </tbody>
       
      </table>
     
    </div>
    
    </div>

    <script>
        window.addEventListener("focus-input-edit", () => {
            setTimeout(() => {
                document.querySelector(".input-category-modal-edit").focus() 
            }, 250);
        })
    </script>
    
    
<div class="m-container-show-product">

  <x-jet-dialog-modal wire:model="confirmAddCategory">
    <x-slot name="title">
        {{ __('Adicionar categoria') }}
    </x-slot>

    <x-slot name="content">
        {{ __('Selecione uma categoria.') }}

        <div class="mt-4">
             <select name="" id="">
                @foreach ($categories as $category)
             <option value="">{{$category->name}}</option>
                @endforeach
             </select>
        </div>
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$toggle('confirmAddCategory')" wire:loading.attr="disabled">
            {{ __('Cancelar') }}
        </x-jet-secondary-button>

        <x-jet-danger-button class="ml-2" wire:click="addCategoryModal" wire:loading.attr="disabled">
            {{ __('Adicionar') }}
        </x-jet-danger-button>
    </x-slot>
</x-jet-dialog-modal>


  <form method="POST" wire:submit.prevent='save'>
  
    <div class="container-header">
        <div class="left-header">
          @if ($user)
        <div class="img-header"> <a href="{{route('users.show',$user)}}"><img src="{{$user->profile_photo_url}}" alt=""></a></div>
        <div class="user-name-create-product">{{$user->name}}</div>
            <div class="user-date-create-product">21/12/2020 20:55</div>
          @else
          <div class="img-header"> <img src="{{asset('imgs/no_image.jpg')}}" alt=""></div>
          <div class="user-name-create-product">Usuário deletado</div>
          @endif
        </div>

        @php
        $profit = 0;
        $margin = 0;
            if(is_numeric($productCost) && is_numeric($productSale)) {
            $profit = $productSale - $productCost;
            $margin = ($profit / $productSale)  * 100;
            }
        @endphp
        <div class=btn-save-product><button type="submit">salvar</button></div>
          <div class="message-save-success-product">salvo.</div>
        <div class="right-header">
        <div class="product-name"><label for="" class="product-label">Produto : </label><input type="text" wire:model='name'  value="{{$product->name}}"></div>
          <div class="product-prices">
          <div class="product-price-cost" 
            @error('productCost') style="border: 1px solid red" @enderror>
          <label for="" class="product-label">Preço de custo </label><input type="text"  wire:model='productCost' value="{{number_format($product->cost_price,2,".","")}}"></div> 
            <div class="product-price-sale"
            @error('productSale') style="border: 1px solid red" @enderror
            ><label for="" class="product-label">Preço de venda  </label><input type="text" wire:model='productSale' value="{{number_format($product->sale_price,2,".","")}}"></div> 
            <div class="product-amount" 
            @error('amount') style="border: 1px solid red" @enderror
            ><label for="" class="product-label">Quantidade  </label><input type="text" wire:model='amount' value="{{$product->amount}}"></div> 
            <div class="product-price-profit"><label for="" class="product-label">Lucro  </label><input type="text" disabled value="{{$profit}}"></div>  
          <div class="product-margin"><label for="" class="product-label">Margin </label> <input type="text" disabled value="{{number_format($margin,2,'.','')}}%"></div>
         
          </div>
          <div class="product-category">
              <label for="" class="product-label"><div>Categorias :</div></label> 
              <div class="container-product-category-array">
                @foreach ($product->categories as $category)
              <span class="category-name"><span>#{{$category->name}}</span> <a class="remove-category-data"  data-id="{{$category->id}}" wire:click='removeCategory({{$category->id}})'><i class="far fa-times-circle"></i></a></span>
              @endforeach
              <span class="category-add"><i class="fas fa-plus"></i><span wire:click='addCategory({{$product->id}})'><a > Nova</a></span>
              </div>
          </div>        
        <div class="product-description"><label for="" class="product-label"><div>Descrição :</div> </label>
        <textarea wire:model='description' rows="3">{{$product->description}}</textarea></div> 
          <div class="product-prices">
            
          </div>  
        </div>
    </div>
  
    <div class="container-body">
  
      <div class="product-card">
        <div class="product-image" style="background-image: url({{asset('imgs/img1.webp')}})"></div>
        <div class="product-delete-update">
          <div class="product-delete-image"><form action=""><button type="submit"><i class="far fa-trash-alt"></i></button></form></div>
          <div class="product-edit-image"><form action=""><button type="submit"><i class="fas fa-pen"></i></button></form></div></div>
      </div>
  
      <div class="product-card">
        <div class="product-image" style="background-image: url({{asset('imgs/img2.webp')}})"></div>
        <div class="product-delete-update">
          <div class="product-delete-image"><form action=""><button type="submit"><i class="far fa-trash-alt"></i></button></form></div>
          <div class="product-edit-image"><form action=""><button type="submit"><i class="fas fa-pen"></i></button></form></div></div>
      </div>
      <div class="product-card">
        <div class="product-image" style="background-image: url({{asset('imgs/img3.webp')}})"></div>
        <div class="product-delete-update">
          <div class="product-delete-image"><form action=""><button type="submit"><i class="far fa-trash-alt"></i></button></form></div>
          <div class="product-edit-image"><form action=""><button type="submit"><i class="fas fa-pen"></i></button></form></div></div>
      </div>
      <div class="product-card">
        <div class="product-image" style="background-image: url({{asset('imgs/img1.webp')}})"></div>
        <div class="product-delete-update">
          <div class="product-delete-image"><form action=""><button type="submit"><i class="far fa-trash-alt"></i></button></form></div>
          <div class="product-edit-image"><form action=""><button type="submit"><i class="fas fa-pen"></i></button></form></div></div>
      </div>
      <div class="product-card">
        <div class="product-image" style="background-image: url({{asset('imgs/img3.webp')}})"></div>
        <div class="product-delete-update">
          <div class="product-delete-image"><form action=""><button type="submit"><i class="far fa-trash-alt"></i></button></form></div>
          <div class="product-edit-image"><form action=""><button type="submit"><i class="fas fa-pen"></i></button></form></div></div>
      </div>
  
    </div>
  
  </form>
  
  <script type="text/javascript">
      let messageSaveProductSuccess = document.querySelector(".message-save-success-product");
      let btnSaveProduct = document.querySelector(".btn-save-product");

      btnSaveProduct.addEventListener("click", function() {
        setTimeout(() => {
          messageSaveProductSuccess.style.animation = ""
          messageSaveProductSuccess.style.display = "block"
          messageSaveProductSuccess.style.animation = "product-in-message-success 1.1s ease forwards"
         
        }, 100);
        setTimeout(() => {
          messageSaveProductSuccess.style.animation = ""
          messageSaveProductSuccess.style.animation = "product-out-message-success 1s ease  forwards"
          
        }, 1500);
        
      })



  </script>
      
  </div>




<div class="m-container-show-product">


  <form action="/">
  
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
        <div class="right-header">
        <div class="product-name"><input type="text"  value="Produto : {{$product->name}}"></div>
          <div class="product-prices">
          <div class="product-price-cost"><label for="" class="product-label">Preço de custo </label><input type="number" wire:model='productCost' value="{{number_format($product->cost_price,2,".","")}}"></div> 
            <div class="product-price-sale"><label for="" class="product-label">Preço de venda  </label><input type="number" wire:model='productSale' value="{{number_format($product->sale_price,2,".","")}}"></div> 
            <div class="product-amount"><label for="" class="product-label">Quantidade  </label><input type="text" value="{{$product->amount}}"></div> 
            <div class="product-price-profit"><label for="" class="product-label">Lucro  </label><input type="number" disabled value="{{$profit}}"></div>  
          <div class="product-margin"><label for="" class="product-label">Margin </label> <input type="text" disabled value="{{number_format($margin,2,'.','')}}%"></div>
         
          </div>
          <div class="product-category">
              <label for="" class="product-label"><div>Categorias :</div></label> 
              <div class="container-product-category-array">
                @foreach ($product->categories as $category)
                <span class="category-name"><span>#{{$category->name}}</span> <a href="#" wire:click='removeCategory({{$category->id}})'><i class="far fa-times-circle"></i></a></span>
              @endforeach
              <span class="category-add"><i class="fas fa-plus"></i><span><a href="" wire:click='removeCategory'> Nova</a></span>
              </div>
          </div>        
        <div class="product-description"><label for="" class="product-label"><div>Descrição :</div> </label>
        <textarea name="" id="" rows="3">{{$product->description}}</textarea></div> 
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
  
      
  </div>

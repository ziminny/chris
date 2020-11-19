<div class="products-m-container">  


    

<div class="container-products-dynamic" style="overflow: none">  
    

    @livewire('product.product-search')
    @if ($products->count() > 0)
    @foreach ($products as $product)
        
   
<div class="product-card">
         <div class="products-card-left-1">
            
         </div>
 
         <div class="products-card-right">
         <div class="product-title"><span class="name-product">{{$product->name}} </span><a href="{{route('products.show',$product)}}" class="product-view"><i class="far fa-eye"></i></a></div>
             <div class="product-body">
             <span><span>Custo:</span> <span class="teste">R$-{{$product->sale_price}}</span></span>
                    <span><span>Venda:</span> <span>R$-{{$product->cost_price}}</span></span>
                    <span><span>Lucro:</span> <span>R$-{{$product->sale_price - $product->cost_price}}</span></span>
                    <span><span>Margem:</span> <span>105%</span></span>
               
             </div>
             <div class="product-footer">
                 @php
                     $i = 0;
                 @endphp
                
                 @foreach ($product->categories as $category)
                 
                     @if ($i<3)
                     <span>#{{$category->name}}</span>
                     @endif
                     @php
                         $i++;
                     @endphp
                 @endforeach
                
                 
             </div>
         </div>
        
     </div>
 
     @endforeach
     @else
     <div class= "search-empty-products">
         <span>Sua busca nao retornou nenhum produto ou vocẽ não tem produdo cadastrado !</span>
     
     </div>
     @endif
     <div class="m-links-products">
         {{$products->links()}}
     </div>
    
 </div>


</div>



<script type="text/javascript">
//Cards
let buttonCategories = document.querySelector("#buttons-cards-products-1");
let buttonProducts = document.querySelector("#buttons-cards-products-2");
let buttonCar = document.querySelector("#buttons-cards-products-3");
//Ativa e desativa
let cardCategories = document.querySelector(".container-categories-dynamic");
let cardCar = document.querySelector(".container-car-dynamic");
let cardProducts = document.querySelector(".container-products-dynamic");


    buttonCategories.addEventListener("click",function() {
        events(cardCar,cardProducts,cardCategories);
        })

    buttonProducts.addEventListener("click",function() {

        events(cardCar,cardCategories,cardProducts);
      
    })

    buttonCar.addEventListener("click",function() {

        events(cardProducts,cardCategories,cardCar);
    })

    let events = (firsrtDisplayNone , secondtDisplayNone , displayActive) => {
        firsrtDisplayNone.style.display = "none";
        secondtDisplayNone.style.display = "none";
        displayActive.style.animation = "opacity-peroducts-cards 1s ease-in-out forwards"
        displayActive.style.display = "flex";
    }
</script>

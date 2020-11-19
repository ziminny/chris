       {{-- Painel catecorias  --}}
       <div class="container-category-product" >
       @foreach ($items as $key => $item)    
       <div class="category-product-main-painel">
                    <div class="add-new-category-row"  id="buttons-cards-products-{{$key+1}}">
                    <div class="add-new-left-col-{{$key+1}}"><i class="{{$item['icon']}}"></i></div>
                        <div class="add-new-right-col">
                            <div class="content-category-title-body">
                                <div class="add-new-title">{{$item['title']}}</div>
                                <div class="add-new-message">{{$item['total']}}</div>
                            </div>
                            <div class="line-right-card-{{$key+1}}">
                                    <i class="fas fa-info-circle card-icon-info"></i>
                            </div>
                        </div> 
                    </div>
                </div>
        @endforeach      
    </div> 

    <script type="text/javascript">
                let cards = document.querySelectorAll(".category-product-main-painel");
                let icon = document.querySelector(".add-new-left-col");
                let divRight = [];
                let iconInner = [];


                    for (let index = 0; index < cards.length; index++) {
                        
                            divRight[index] = document.querySelector(`.line-right-card-${index+1}`);
                            iconInner[index] = document.querySelector(`.line-right-card-${index+1} .card-icon-info`);

                                 cards[index].addEventListener("click", () => {
                                     
                                        resetElements(divRight,iconInner , index)
                                        divRight[index].style.animation = "div-rigth 0.5s ease-in-out forwards"
                                        iconInner[index].style.animation = "icon-info-show 0.6s ease-out forwards"
                                 })
   
                    }
            // Por padrão começa com a categoria de produtos        
            divRight[1].style.animation = "div-rigth 0.5s ease-in-out forwards"
            iconInner[1].style.animation = "icon-info-show 0.6s ease-out forwards"
    // Funçao para quando clicar em uma categoria voltar só a que esta aberta                
    let resetElements = (div, icon , index) => {

                icon.filter((element) => {
                        return element != iconInner[index];
                    }).map((element , i)=> {
                    
                            if(element.style.animation != "")  {
                                element.style.animation = ""
                                element.style.animation = "icon-info-show-reverse 0.6s ease-out forwards"  
                                                         
                                }
                    });

                div.filter((element) => {
                        return element != divRight[index];
                    }).map((element , i)=> {
                    
                            if(element.style.animation != "")  {
                                element.style.animation = ""
                                element.style.animation = "div-rigth-reverse 0.5s ease-in-out reverse forwards"                      
                            }
                       });
    } 
         
    </script>

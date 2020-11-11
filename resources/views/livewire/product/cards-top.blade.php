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
                let iconInner = []

                    for (let index = 0; index < cards.length; index++) {
                        
                                 divRight[index] = document.querySelector(`.line-right-card-${index+1}`);
                                 iconInner[index] = document.querySelector(`.line-right-card-${index+1} .card-icon-info`);

                            cards[index].addEventListener("click", function() {

                            divRight[index].style.animation = ""
                            iconInner[index].style.animation = ""
                            divRight[index].style.animation = "div-rigth 0.5s ease-in-out forwards"
                            iconInner[index].style.animation = "icon-info-show 0.6s ease-out forwards"
                            let newArrayIconInner = iconInner.slice(index,1)
                            let newArrayDivRight = divRight.slice(index,1)

                            newArrayDivRight[index].style.animation = ""
                            newArrayIconInner[index].style.animation = ""
                            // newArrayDivRight[index].style.animation = "div-rigth-reverse 0.5s ease-in-out reverse forwards"
                            // newArrayIconInner[index].style.animation = "icon-info-show-reverse 0.6s ease-out forwards"  
                            })

                            // cards[index].addEventListener("mouseleave", function() {
                            // divRight.style.animation = "div-rigth-reverse 0.5s ease-in-out reverse forwards"                        
                            // iconInner.style.animation = "icon-info-show-reverse 0.6s ease-out forwards"   
                            // })

                                cards[index].addEventListener("mousemove", function(e) {
        
                            })
                        
                    }            
    </script>

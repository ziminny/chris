
<div class="table-show">
    <div class="container-categories-dynamic" style="display: {{$display ?? 'none'}}; width:95%;">

        @livewire('category.search')

       <table class="table-categories">
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
                                        @livewire('category.delete',['category' => $category] , key($category->id."delete"))
                                        @livewire('category.edit' ,['category' => $category] , key($category->id."edit")) 
                                    </div>
                                </td>
                        </tr>

                @endforeach
            
            </tbody>
        </table> 
    </div> 
</div>


    
    
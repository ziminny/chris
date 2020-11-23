<div class="show-mobile-search">
<form  method="POST" class="form-search-mobile">
    <div class="show-img-close-mobile"><img src="{{asset("imgs/show_users/search-mobile.svg")}}" alt=""></div>
        <div class="show-input-search-mobile">
            <input type="text" wire:model='search' wire:keyup='$emit("{{$target}}")' placeholder="Buscar">
        </div>
    </form>
<a class="search-a" href="{{route($route)}}"> <button class="search-user-btn"><i class="fas fa-plus"></i><span>{{$btnAction}}</span></button></a>
</div>
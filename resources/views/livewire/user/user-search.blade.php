<div class="show-users-mobile-search">
    <form  method="POST" class="form-search-mobile">
        <div class="show-users-img-close-mobile"><img src="{{asset("imgs/show_users/search-mobile.svg")}}" alt=""></div>
            <div class="show-users-input-search-mobile">
                <input type="text" wire:model='search' wire:keyup='$emit("teste")' placeholder="Bucar usuário">
            </div>
        </form>
    <a class="search-user-a" href="{{route("users.create")}}"> <button class="search-user-btn"><i class="fas fa-plus"></i><span>Adicionar</span></button></a>

</div>
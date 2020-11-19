<div class="products-search">
    <input type="text" placeholder="Buscar um produto" wire:model='search' wire:keyup='$emit("searchproduct")'>
    <a href="#" class="btn-add-new-product"><i class="fas fa-plus product-view"></i> <span>Adicionar</span></a>
</div>

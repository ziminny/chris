

@extends('layouts.base')
@section('title',"Gerênciamento de estoque")
@section('content-all')
        @can('is-admin-gate', User::class)
            @livewire('cards',['title' => 'Usuários','icon' => 'fas fa-user','body' => 'Lista detalhada de usuários e premissões de acesso.','img' => 'user' , 'route'=>'users.index'])
        @endcan
    
    @livewire('cards',['title' => 'Produtos','icon' => 'fab fa-product-hunt','body' => 'Gerêncie seus produtos.','img' => 'product', 'route'=>'product.index'])
    @livewire('cards',['title' => 'Venda','icon' => 'far fa-money-bill-alt','body' => 'Efetue uma venda.','img' => 'sale', 'route'=>'sale.index'])
   
        @can('is-admin-gate', User::class)
            @livewire('cards',['title' => 'Relatórios','icon' => 'fas fa-chart-line','body' => 'Gráficos com buscas personalizadas.','img' => 'chart', 'route'=>'chart.index'])
        @endcan
   
@endsection




@extends('layouts.base')

@section('title')
    {{Breadcrumbs::render("products.show",$product)}}
@endsection

@section('content-all')
    @livewire('product.product-show',['product' => $product, 'user' => $user]);
@endsection
               
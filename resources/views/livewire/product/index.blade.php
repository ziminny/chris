@extends('layouts.base')
@section('title')
{{Breadcrumbs::render("products")}}
@endsection

@section('content-all')
    @livewire('product.cards-top')
    @livewire('product.cards-list')
   
@endsection
               

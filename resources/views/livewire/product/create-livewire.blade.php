

@extends('layouts.base')
@section('title')
{{Breadcrumbs::render("products.create")}}
@endsection

@section('content-all')
    @livewire('product.create')
   
@endsection

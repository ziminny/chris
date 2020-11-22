

    @extends('layouts.base')
@section('title')
{{Breadcrumbs::render("products.show",$product)}}
@endsection
{{-- {{dd($user->profile_photo_path)}} --}}
@section('content-all')

@livewire('product.product-show',['product' => $product, 'user' => $user]);

   
@endsection
               
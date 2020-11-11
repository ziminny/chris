@extends('layouts.base')
@section('title')
{{Breadcrumbs::render("users")}}
@endsection

    

@section('content-all')
    @livewire('user.user-list')
@endsection
                
                



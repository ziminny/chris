

@extends('layouts.base')
@section('title')
{{Breadcrumbs::render("users.create")}}
@endsection

    

@section('content-all')


    @livewire('user.user-form-create')

            
@endsection
                
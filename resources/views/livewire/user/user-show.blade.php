@extends('layouts.base')

@section('title',"Editar Perfil")
    

@section('content-all')

<div>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updateProfileInformation()))
            @livewire('user.user-edit',['user' => $user])

            <x-jet-section-border />
        @endif

        <div class="mt-10 sm:mt-0">
            @livewire('user.user-delete',['user' => $user])
        </div>
    </div>
</div>
    
@endsection

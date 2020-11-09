<div class="home-card">
    <div class="home-card-header">
    <span><i class="{{$icon}}"></i></span>  <span>{{$title}}</span>
    </div>
    <div class="home-card-body">
    <span>{{$body}}</span>
    <span class="home-body-img img-{{$img}}">
  
    </span>
    </div>
@php
    $mView = 'dashboard'
@endphp
    <div class="home-card-footer">
    <button wire:click="returnRoute"><i class="fas fa-plus icon-btn-footer"></i> INFO</button>
    </div>
</div>
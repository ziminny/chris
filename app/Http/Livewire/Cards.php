<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Cards extends Component
{
    public $title;
    public $icon;
    public $body;
    public $img;
    public $route;

    public function render()
    {
        return view('livewire.cards');
    }

    public function returnRoute()
    {
        return redirect()->route($this->route);
    }
}

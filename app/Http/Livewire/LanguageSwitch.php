<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LanguageSwitch extends Component
{
    public function render()
    {
        return view('livewire.language-switch');
    }
    public function setLocale($locale){
        session()->put('locale', $locale);
    }
}

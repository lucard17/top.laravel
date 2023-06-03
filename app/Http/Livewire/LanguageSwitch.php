<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\App;
use Livewire\Component;

class LanguageSwitch extends Component
{
    public $locale;
    public $showLocaleSwitch = false;
    public function render()
    {
        return view('livewire.language-switch');
    }
    public function mount()
    {
        $this->locale = App::getLocale();
    }
    public function setLocale($locale)
    {
        $this->locale = $locale;
        session()->put('locale', $locale);
        $this->showLocaleSwitch = false;
        return redirect(request()->header('Referer'));

    }
    public function showLocaleSwitch()
    {
        $this->showLocaleSwitch = !$this->showLocaleSwitch;
    }
}
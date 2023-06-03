<div class="relative" x-data="{ showLocaleSwitch:false }">
    <img
    @switch($locale)
        @case('en')
            src="https://hatscripts.github.io/circle-flags/flags/us.svg"
            @break
        @case('ru')
           src="https://hatscripts.github.io/circle-flags/flags/ru.svg"
            @break
        @default
            src="https://hatscripts.github.io/circle-flags/flags/us.svg"       
    @endswitch
    width="24" @click="showLocaleSwitch=!showLocaleSwitch">
    <div 
        x-show="showLocaleSwitch" 
        class="absolute top-full left-0 pt-2"  
        @click="showLocaleSwitch=false" 
        @click.outside="showLocaleSwitch=false" 
    style="display: none">
        @if ($locale != 'en')
            <img src="https://hatscripts.github.io/circle-flags/flags/us.svg" width="24" wire:click="setLocale('en')">
        @endif
        @if ($locale != 'ru')
            <img src="https://hatscripts.github.io/circle-flags/flags/ru.svg" width="24" wire:click="setLocale('ru')">
        @endif
    </div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
</div>
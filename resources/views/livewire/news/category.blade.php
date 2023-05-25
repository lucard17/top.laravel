<div>
    <div class="flex items-center mt-4 border {{ $isEdit?' border-emerald-700':'border-transparent' }}">
        @if ($isEdit)
        <input type="text" wire:model='category.name' class="bg-transparent flex-1 px-2 py-1 underline">

        @else
        <a href="{{ url("news/?category=".$category->id) }}"
            class="bg-transparent flex px-2 py-1 underline disabled:no-underline">
            {{ $category->name }}
        </a>
        <sup class="me-auto text-xs">{{ $category->articles->count() }}</sup>
        
        @endif
        @admin
        <button wire:click="edit" class=" w-16 py-1 hover:bg-emerald-700 hover:text-slate-50">edit</button>
        <button wire:click="delete" class="w-16 py-1 enabled:hover:bg-red-600  enabled:hover:text-slate-50" {{
            $isEdit?'disabled':'' }}>delete</button>
        @endadmin
    </div>
    @error('category.name')
    <div class=" text-red-600">{{ $message }}
    </div>
    @enderror
</div>
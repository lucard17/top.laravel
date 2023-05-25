{{-- {{ dd($categories) }} --}}
<div>
    @admin
    <div class="flex items-center ">
        <input class="border border-e-0 block flex-1  px-2 py-1" type="text" wire:model.debounce.500ms='name'
            placeholder="Input Category Name">
        <button wire:click="add" class="p-1 border text-slate-50 hover:bg-slate-50 hover:text-slate-950">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>

        </button>
    </div>
    @endadmin
    @error('name') <div class="text-red-600">{{ $message }}</div> @enderror
    @foreach ($categories as $index=>$category)
    @livewire('news.category', ['category'=>$category], key($category->id))
    @endforeach
</div>
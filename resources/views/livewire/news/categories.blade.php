{{-- {{ dd($categories) }} --}}
<div>
    <div class="flex items-center ">
        <input class="border border-e-0 rounded-s block flex-1  px-2 py-1" type="text" wire:model.debounce.500ms='name' placeholder="Input Category Name">
        <button wire:click="add" class="w-16 py-1 border border-emerald-700 rounded-e bg-emerald-700 text-slate-50 hover:bg-emerald-500 hover:border-emerald-500">add</button>
    </div>
    @error('name') <div class="text-red-600">{{ $message }}</div> @enderror
    @foreach ($categories as $index=>$category)
    @livewire('news.category', ['category'=>$category], key($category->id))
    @endforeach
</div>
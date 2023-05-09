<div>
    <div class="flex items-center gap-4 mt-4 rounded{{ $isEdit?' bg-emerald-300':'' }}">

        <input type="text" wire:model='category.name'
            class="bg-transparent flex-1 px-2 py-1 underline disabled:no-underline" {{ $isEdit?'':'disabled' }}>

        <button wire:click="edit" class="rounded w-16 py-1 hover:bg-emerald-700 hover:text-slate-50">edit</button>
        <button wire:click="delete" class="rounded w-16 py-1 hover:bg-red-600 hover:text-slate-50"">delete</button>
    
</div>
@error('category.name')
    <div class=" text-red-600">{{ $message }}
    </div>
    @enderror
</div>
<div>

    <h2 class="text-5xl text-center mt-20 h-16">
        @if(!$isEdit)
        {{ $newsArticle->title }}
        @else
        <input type="text" name="title" wire:model="newsArticle.title" class="text-5xl text-center border w-full"
            placeholder="Article Title">
        @endif
    </h2>
    @error('newsArticle.title') <span class="text-red-500">{{ $message }}</span> @enderror

    {{-- header --}}
    <section class="flex gap-8 mt-16">

        {{-- Image --}}
        <div class="h-40 relative">
            @if ($newsArticle->image_path)
            {{-- {{ asset($newsArticle->image_path) }}  --}}
            <img src="{{ asset($newsArticle->image_path) }}" alt="{{ $newsArticle->title }}" class="h-full">
            {{-- delete --}}
                @if (auth()->check() && (auth()->user()->id == $newsArticle->user_id) && ($isNew || $isEdit) )
                <div class="absolute bottom-0 right-0 top-0 left-0 bg-transparent hover:bg-slate-950 hover:bg-opacity-60">
                    <button class="absolute bottom-2 right-2 hover:bg-red-600 p-2" wire:click="deleteImage">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                        </svg>
                    </button>
                </div>
                @endif
            @else
                @if ($isNew || auth()->check() && (auth()->user()->id == $newsArticle->user_id ))
                    @if ($articleImage)
                        <img src="{{ $articleImage->temporaryUrl() }}" class="h-full">
                        <div class="absolute bottom-0 right-0 top-0 left-0 bg-transparent hover:bg-slate-950 hover:bg-opacity-60">
                            <div class="absolute bottom-2 right-2 flex flex-col gap-2">
                                @if (!$isNew)
                                {{-- Save image --}}
                                <button class=" hover:bg-green-600 p-2" wire:click='storeImage'>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                    </svg>
                                </button>
                                @endif
    
                                {{-- Clear temporary image --}}
                                <button class=" hover:bg-red-600 p-2" wire:click='resetTemporaryImage'>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg>
                                </button></div>
                        </div>
                        <span class="text-red-500">Previev</span>
                    @else
                        <label for="articleImage" class='p-8 w-40 flex hover:bg-slate-700'>
                        <input id ="articleImage" type="file" wire:model='articleImage' class = "hidden">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                            </svg>
                        </label>
                        
                    @endif
                @endif
            @endif
        </div>
        {{-- author info --}}
        <div class="flex flex-col gap-4 justify-end">
            <div class="flex items-center gap-2 ">
                {{-- Author.avatar --}}
                <div class='h-full'>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>

                </div>
                {{-- Author.name --}}


                <a href="{{ $isNew ? url('news/?user='.Auth::user()->id) : url('news/?user='.$newsArticle->user->id) }}"
                    class="text-sm text-slate-500 font-semibold) }} " class="block">
                    {{ $isNew? Auth::user()->name : $newsArticle->user->name }}
                </a>
                {{-- time --}}
                <span class="text-sm text-slate-500 block me-auto">
                    @if (!$isNew){{ $newsArticle->created_at->diffForHumans() }} @endif
                </span>
            </div>
            {{-- Category --}}
            <div class="text-sm text-slate-50 pt-2">
                Category:
                @if(!$isEdit)
                <a href="{{ url("news/?category=".$newsArticle->category->id) }}">
                    {{
                    $newsArticle->category->name }}
                </a>
                @else
                <select name="category" wire:model="newsArticle.news_category_id">
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}" class="text-black">{{ $category->name }}
                    </option>

                    @endforeach

                </select>
                @endif

            </div>

            {{-- isPublished --}}
            <label class="text-sm text-slate-50 pt-2 cursor-pointer">
                Published:&nbsp;
                @if($isEdit)
                <input type="checkbox" name="is_published" wire:model="newsArticle.is_published"
                    class="ms-2 appearance-none w-0 h-0">
                @endif
                @if ($newsArticle->is_published)
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6  inline">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                @else
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6 inline">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                </svg>
                @endif

            </label>
        </div>
        {{-- control_panel --}}
        @if ($isNew || auth()->check() && (auth()->user()->id == $newsArticle->user_id))
        <div class="ms-auto flex flex-col">
            {{-- edit --}}
            @if (!$isNew && auth()->check() && (auth()->user()->id == $newsArticle->user_id ||
            auth()->user()->isAdmin()))
            <button wire:click='edit' class="p-2 border border-transparent hover:border-slate-50">
                @if(!$isEdit)
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                </svg>
                @else
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                </svg>
                @endif
            </button>
            {{-- delete --}}
            <button class="p-2 border border-transparent hover:border-red-600 hover:bg-red-600 mt-2"
                wire:click='delete'>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                </svg>
            </button>
            @endif
            {{-- save --}}
            @if($isNew)
            <button class=" hover:bg-green-600 p-2" wire:click='storeArticle'>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 6.375c0 2.278-3.694 4.125-8.25 4.125S3.75 8.653 3.75 6.375m16.5 0c0-2.278-3.694-4.125-8.25-4.125S3.75 4.097 3.75 6.375m16.5 0v11.25c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125V6.375m16.5 0v3.75m-16.5-3.75v3.75m16.5 0v3.75C20.25 16.153 16.556 18 12 18s-8.25-1.847-8.25-4.125v-3.75m16.5 0c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125" />
                </svg>
            </button>
            @endif
        </div>
        @endif
    </section>
    <hr class="my-8">
    @if(!$isEdit)
    {!! $newsArticle->body !!}
    @else
    {{-- <textarea type="text" name="title" class="w-full ">{!! $newsArticle->body !!}</textarea> --}}
    <textarea name="body" class="w-full h-32 border" wire:model="newsArticle.body"
        placeholder="Write your article"></textarea>
    @endif




    {{-- Because she competes with no one, no one can compete with her. --}}
</div>
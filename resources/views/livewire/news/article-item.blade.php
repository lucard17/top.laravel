<div class="mt-8">
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
        <a href="{{ url('news/?user='.$newsArticle->user->id) }}" class="text-sm text-slate-500 font-semibold) }} "
            class="block">{{ $newsArticle->user->name }}</a>
        {{-- time --}}
        <span class="text-sm text-slate-500 block">{{ $newsArticle->created_at->diffForHumans() }}</span>
        {{-- is_published --}}
        @if (Route::currentRouteName()=='news.articles' )
        @if ($newsArticle->is_published)
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="w-5  inline">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
        </svg>
        @else
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="w-5 inline">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
        </svg>
        @endif
        @endif



        {{-- delete --}}
        @if (auth()->check() && (auth()->user()->id == $newsArticle->user_id || auth()->user()->isAdmin()))
        <button wire:click="$emitUp('deleteArticle', {{ $newsArticle->id }})"
            class=" p-1 ms-auto enabled:hover:bg-red-600  enabled:hover:text-slate-50">
            <svg class='w-5' xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
            </svg>
        </button>
        @endif

    </div>
    {{-- Content --}}
    <div class="flex w-full gap-4 mt-4">
        <div class="flex-grow">
            <h3 class="text-xl font-semibold"> <a href="{{ route('news.article',['id'=>$newsArticle->id]) }}">
                    {{ $newsArticle->title }}
                </a></h3>
            <p><a href="{{ route('news.article',['id'=>$newsArticle->id]) }}">{{ $newsArticle->body }}</a></p>
            {{-- Category --}}
            <div class="text-sm text-slate-500 pt-2">
                <a href="{{ url("news/?category=".$newsArticle->category->id) }}">{{ __('category') }}: {{
                    $newsArticle->category->name }}</a>
            </div>
        </div>
        <div class="flex-shrink-0">
            <a href="{{ route('news.article',['id'=>$newsArticle->id]) }}">
                <img src="{{ $newsArticle->image_path }}" alt="" class="w-36">
            </a>
        </div>
    </div>
</div>
<div>
    <h2 class="text-3xl mb-16">{{ __('news') }}</h2>

    <div class="flex gap-4">
        @if ($category)
        <button class="flex items-center group cursor-pointer" wire:click="resetCategory">
            <span>{{__('category')}}: {{ $categoryName }}</span>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-4 h-4 opacity-0 group-hover:opacity-100">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
        @endif
        @if ($user)
        <button class="flex items-center group cursor-pointer" wire:click="resetUser">
            <span>{{__('author')}}: {{ $userName }}</span>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-4 h-4 opacity-0 group-hover:opacity-100">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
        @endif
    </div>
    @foreach($newsArticles as $newsArticle)
    <livewire:news.article-item :newsArticle="$newsArticle" wire:key="{{ $newsArticle->id }}" />
    @endforeach
    <div class="pt-16 pb-16">
        {{ $newsArticles->links() }}
    </div>


</div>
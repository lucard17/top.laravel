<div>
    <div class="flex justify-between  mb-16">
        <h2 class="text-3xl "> {{ __("Your articles") }} </h2>
        <button wire:click='addArticle' class="text-3xl border border-transparent hover:border-slate-50">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-8 h-8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
        </button>
    </div>
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

    </div>
    @if(!count($newsArticles))
    <p class="mt-8">{{ __("There are no articles") }}</p>
    @endif

    @foreach($newsArticles as $newsArticle)
    <livewire:news.article-item :newsArticle="$newsArticle" wire:key="{{ $newsArticle->id }}" />
    @endforeach

    <div class="pt-16 pb-16">
        {{ $newsArticles->links() }}
    </div>
</div>
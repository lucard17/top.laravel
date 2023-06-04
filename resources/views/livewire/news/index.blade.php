<div>
    <h2 class="text-3xl mb-16">{{ __('news') }}</h2>


    @foreach($newsArticles as $newsArticle)
    <livewire:news.article-item :newsArticle="$newsArticle" wire:key="{{ $newsArticle->id }}" />
    @endforeach
    <div class="pt-16 pb-16">
        {{ $newsArticles->links() }}
    </div>


</div>
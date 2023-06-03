<div>
    <h2 class="text-3xl">{{ __('news') }}</h2>

    @foreach($newsArticles as $newsArticle)
    <livewire:news.article-item :newsArticle="$newsArticle" wire:key="{{ $newsArticle->id }}" />

    @endforeach
</div>

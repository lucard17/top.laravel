<?php

namespace App\Http\Livewire\News;

use App\Models\NewsArticle;
use Livewire\Component;

class ArticleItem extends Component
{
    public $newsArticle;
    public function render()
    {
        return view('livewire.news.article-item');
    }
    public function mount(NewsArticle $newsArticle)
    {
        $this->newsArticle = $newsArticle;

    }
}
<?php

namespace App\Http\Livewire\News;

use App\Models\NewsArticle;
use Illuminate\Support\Arr;
use Livewire\Component;

class Index extends Component
{
    public $newsArticles;
    public $category;
    public $query;
    protected $listeners = ['deleteArticle' => 'deleteArticle'];
    public function render()
    {
        return view('livewire.news.index')
            ->extends('main')
            ->section('content');

    }
    public function mount()
    {
        $this->getArticles();
    }
    public function getArticles()
    {
        // http://127.0.0.1:8000/news/?category=1
        $query = request()->query();
        if (Arr::has($query, 'category')) {
            $this->newsArticles = NewsArticle::where('is_published', 1)->where('news_category_id', $query['category'])->orderBy('created_at', 'desc')->get();
        } elseif (Arr::has($query, 'user')) {
            $this->newsArticles = NewsArticle::where('is_published', 1)->where('user_id', $query['user'])->orderBy('created_at', 'desc')->get();

        } else {
            $this->newsArticles = NewsArticle::where('is_published', 1)->orderBy('created_at', 'desc')->get();
        }
    }
    public function deleteArticle($id)
    {
        NewsArticle::find($id)->delete();
        $this->getArticles();
    }
}
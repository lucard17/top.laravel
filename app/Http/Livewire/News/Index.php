<?php

namespace App\Http\Livewire\News;

use App\Models\NewsArticle;
use App\Models\NewsCategory;
use App\Models\User;
use Illuminate\Support\Arr;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $newsArticles;
    public $category;
    public $categoryName;
    public $query;
    public $user;
    public $userName;
    protected $request;
    protected $queryString = [
        'user' => ['except' => ""],
        'category' => ['except' => ""],
        'page' => ['except' => 1]
    ];
    protected $listeners = [
        'deleteArticle' => 'deleteArticle',
        'userSelected' => 'userSelected',
        'categorySelected' => 'categorySelected'
    ];
    public function render()
    {
        return view('livewire.news.index', [
            'newsArticles' => $this->getArticles()->paginate(10),
        ])
            ->extends('main')
            ->section('content');

    }
    public function mount()
    {
        // $this->getArticles();
        // dd($this->newsArticles);
    }
    public function getArticles()
    {
        // http://127.0.0.1:8000/news/?category=1
        $this->newsArticles = NewsArticle::where('is_published', 1);
        if ($this->user) {
            $this->userName = User::find($this->user)->name;
            $this->newsArticles = $this->newsArticles->where('user_id', $this->user);
        }
        if ($this->category) {
            $this->categoryName = NewsCategory::find($this->category)->name;
            $this->newsArticles = $this->newsArticles->where('news_category_id', $this->category);
        }

        $this->newsArticles = $this->newsArticles->orderBy('created_at', 'desc');
        return $this->newsArticles;
    }
    public function userSelected($id)
    {
        $this->user = $id;
        $this->resetPage();
    }
    public function categorySelected($id)
    {
        $this->category = $id;
        $this->resetPage();
    }
    public function deleteArticle($id)
    {
        NewsArticle::find($id)->delete();
        $this->getArticles();
    }
    public function resetUser(){
        $this->user = null;
    }
    public function resetCategory(){
        $this->category = null;
    }
}
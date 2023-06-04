<?php

namespace App\Http\Livewire\News;

use App\Models\NewsArticle;
use App\Models\NewsCategory;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;

class Articles extends Component
{
    use WithPagination;
    private $newsArticles;
    public $category;
    public $categoryName;
    protected $listeners = [
        'deleteArticle' => 'deleteArticle',
        'categorySelected' => 'categorySelected'
    ];
    protected $queryString = [
        'category' => ['except' => ""],
        'page' => ['except' => 1]
    ];
    public function mount()
    {
        // $this->search = $search;


    }
    public function getArticles()
    {
        // http://127.0.0.1:8000/news/?category=1
        $this->newsArticles = NewsArticle::where('user_id', Auth::user()->id);

        if ($this->category) {
            $this->categoryName = NewsCategory::find($this->category)->name;
            $this->newsArticles = $this->newsArticles->where('news_category_id', $this->category);
        }
        $this->newsArticles = $this->newsArticles->orderBy('created_at', 'desc');
        return $this->newsArticles;
    }
    public function render()
    {
        // dd(request()->query());
        return view('livewire.news.articles', ['newsArticles' => $this->getArticles()->paginate(10)])
            ->extends('main')
            ->section('content');
    }
    public function addArticle()
    {
        redirect(route('news.article'));
    }

    public function deleteArticle($id)
    {
        $newsArticle = NewsArticle::find($id);
        Storage::disk('public')->delete($newsArticle->image_path);
        Storage::disk('public')->deleteDirectory('images/articles/' . $id);
        $newsArticle->delete();
        redirect(route('news.articles'));
        $this->getArticles();
    }
    public function categorySelected($id)
    {
        $this->category = $id;
        $this->resetPage();
    }
    public function resetCategory(){
        $this->category = null;
    }
}
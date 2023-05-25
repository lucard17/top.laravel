<?php

namespace App\Http\Livewire\News;

use App\Models\NewsArticle;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class Articles extends Component
{

    public $newsArticles;
    protected $listeners = ['deleteArticle' => 'deleteArticle'];
    public function mount()
    {
        // $this->search = $search;
        $this->getArticles();

    }
    public function getArticles()
    {
        // http://127.0.0.1:8000/news/?category=1
        $this->newsArticles = NewsArticle::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
    }
    public function render()
    {
        // dd(request()->query());
        return view('livewire.news.articles')
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
}
<?php

namespace App\Http\Livewire\News;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\NewsArticle;
use App\Models\NewsCategory;
use Illuminate\Auth\Events\Validated;
use Livewire\Component;
use Livewire\WithFileUploads;

class Article extends Component
{
    use WithFileUploads;
    public $articleImage;
    public $newsArticleId;
    public $newsArticle;
    public $data;
    public $categories;

    public $isEdit = false;
    public $isNew = false;
    protected function rules()
    {
        return [
            'newsArticle.title' => ['required', 'string', 'max:255', 'min:3'],
            'newsArticle.body' => ['required', 'string', 'max:65535'],
            'newsArticle.news_category_id' => ['required'],
            'newsArticle.is_published' => ['boolean'],
        ];
    }
   
    public function edit()
    {
        if ($this->isEdit) {
            $validated = $this->validate();
            if ($this->newsArticleId) {
                $this->newsArticle->update();
                $this->newsArticle = NewsArticle::find($this->newsArticleId);
            } else {
                $this->newsArticle->user_id = Auth::user()->id;
                $this->newsArticle->save();
                redirect(route('news.article', ['id' => $this->newsArticle->id]));
            }


        }
        $this->isEdit = !$this->isEdit;
    }
    public function storeArticle()
    {
        if ($this->isNew) {
            $validated = $this->validate(['articleImage' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048']);
            $this->newsArticle->user_id = Auth::user()->id;
            $this->newsArticle->image_path = $this->articleImage->store('images/articles/' . $this->newsArticle->id, 'public');
            $this->newsArticle->save();
            redirect(route('news.article', ['id' => $this->newsArticle->id]));
        }

    }
    public function resetTemporaryImage()
    {
        Storage::delete($this->articleImage->temporaryUrl());
        $this->articleImage = null;
    }
    public function storeImage()
    {
        $this->validate([
            'articleImage' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        // $image_path = Storage::disk('public')->put('images/articles/'.$this->newsArticle->id, $this->articleImage);
        $image_path = $this->articleImage->store('images/articles/' . $this->newsArticle->id, 'public');
        $this->newsArticle->image_path = $image_path;
        $this->newsArticle->save();
    }
    public function deleteImage()
    {
        // Storage::disk('public')->delete($this->newsArticle->image_path);
        Storage::disk('public')->delete($this->newsArticle->image_path);
        $this->newsArticle->image_path = null;
        $this->newsArticle->save();
    }
    public function delete()
    {
        Storage::disk('public')->delete($this->newsArticle->image_path);
        Storage::disk('public')->deleteDirectory('images/articles/' . $this->newsArticle->id);
        $this->newsArticle->delete();
        redirect(route('news.articles'));
    }
    public function mount($id = null)
    {
        $this->categories ??= NewsCategory::all();
        if (!$id) {
            $this->isEdit = true;
            $this->isNew = true;

            $this->newsArticle = new NewsArticle;
            $this->newsArticle->news_category_id = $this->categories->first()->id;
            $this->newsArticle->is_published = 1;
        } else {
            $this->newsArticleId = $id;
            $this->newsArticle = NewsArticle::find($id);
        }

    } public function render()
    {
        return view('livewire.news.article')
            ->extends('main')
            ->section('content');
    }


}
<?php

namespace App\Http\Livewire\News;

use App\Models\NewsCategory;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Categories extends Component
{
    public $categories;
    public $name = '';
    protected $listeners = ['categoryDeleted' => 'getCategories'];
    protected function rules()
    {
        return [
            'name' => [
                'required',
                'string',
                'min:5',
                'max:255',
                Rule::unique('news_categories'),
            ]
        ];
    }
    public function add()
    {
        $validated = $this->validate();
        NewsCategory::create($validated);
        $this->name = '';
        $this->getCategories();
    }
    public function mount()
    {
        $this->getCategories();
    }
    public function updated($propertyName)
    {
        // $this->validateOnly($propertyName);
    }
    public function getCategories()
    {
        $this->categories = NewsCategory::all();
    }
    public function render()
    {
        return view('livewire.news.categories')
            ->extends('main')
            ->section('content');
    }
}
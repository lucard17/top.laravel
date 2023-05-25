<?php

namespace App\Http\Livewire\News;

use App\Models\NewsCategory;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Category extends Component
{
    public NewsCategory $category;
    public $isEdit = false;
    protected function rules()
    {
        return [
            'category.name' => [
                'required',
                'string',
                'min:5',
                'max:255',
                Rule::unique('news_categories','name')->ignore($this->category->id),
            ]
        ];
    }
    public function edit()
    {
        if ($this->isEdit) {
            $this->validate();
            $this->category->save();
        }
        $this->isEdit = !$this->isEdit;

    }
    public function delete()
    {
        $this->category->delete();
        $this->emitUp('categoryDeleted');
    }
    public function mount($category)
    {
        $this->category = $category;
    }
    public function updating($propertyName)
    {
    }
    public function render()
    {
        return view('livewire.news.category');
    }
}
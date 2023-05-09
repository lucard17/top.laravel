<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class NewsCategory extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
    public function articles(): HasMany
    {
        return $this->hasMany(NewsArticle::class, 'news_category_id');
    }
}
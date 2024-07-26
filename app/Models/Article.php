<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function author(){
        return $this->belongsTo(User::class, 'author_id');
    }

    public function category(){
        return $this->belongsTo(ArticleCategory::class, 'category_id');
    }
}

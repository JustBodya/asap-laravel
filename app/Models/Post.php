<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'title',
        'content',
        'user_id',
        'is_visible',
        'published_at',
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id')->first()->title;
    }

}

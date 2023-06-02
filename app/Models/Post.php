<?php

namespace App\Models;

use App\Http\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

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

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id')->first()->name;
    }

    public function scopeFilter(Builder $builder, QueryFilter $filters)
    {
        return $filters->apply($builder);
    }
}

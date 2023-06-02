<?php

namespace App\Http\Filters;

class PostFilter extends QueryFilter
{
    public function category_id(int $id)
    {
        return $this->builder->where('category_id', $id);
    }

    public function user_id(int $id)
    {
        return $this->builder->where('user_id', $id);
    }
}

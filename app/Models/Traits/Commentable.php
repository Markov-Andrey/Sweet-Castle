<?php

namespace App\Models\Traits;

use App\Models\Comment;

trait Commentable
{
    /**
     * @return mixed
     */
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable')->orderByDesc('created_at');
    }
}

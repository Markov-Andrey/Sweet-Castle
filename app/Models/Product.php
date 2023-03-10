<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    use HasFactory;

    /**
     * Columns allowed for writing (taken from tables)
     */
    protected $fillable = [
        "title",
        "description",
        "thumbnail",
    ];

    /**
     * Get comments sorted by date
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class)->orderBy("created_at");
    }
}

<?php

namespace App\Models;

use App\Models\Traits\Commentable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    use HasFactory;
    //Trait - Commentable
    use Commentable;

    /**
     * Columns allowed for writing (taken from tables)
     */
    protected $fillable = [
        "title",
        "description",
        "price",
        "thumbnail",
    ];
}

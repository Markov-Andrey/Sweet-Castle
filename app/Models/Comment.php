<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
      "text",
      "user_id",
      "product_id",
    ];

    /**
     * Relationship with parent product
     * @return void
     */
    public function product()
    {
        $this->belongsTo(Product::class);
    }

    /**
     * Relationship with parent user
     * @return void
     */
    public function user()
    {
        $this->belongsTo(User::class);
    }
}

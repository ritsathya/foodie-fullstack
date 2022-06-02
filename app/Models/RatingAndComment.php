<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RatingAndComment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'post_id',
        'body',
        'rating_star',
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function posts()
    {
        return $this->belongsTo(Post::class);
    }
}

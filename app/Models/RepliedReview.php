<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepliedReview extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'rating_and_comment_id',
        'post_id',
        'body',
    ];

    public function rating_and_comment()
    {
        return $this->belongsTo(Rating_And_Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

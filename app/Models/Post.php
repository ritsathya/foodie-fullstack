<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'image_url',
        'video_url',
        'category_id',
        'flavours',
        'ingredients',
        'directions',
        'preparation_time',
        'cooking_time',
        'review',
    ];

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    protected $casts = [
        'category_id' => 'array',
        'flavours' => 'array',
        'ingredient' => 'array',
      ];

      public function user() 
      {
          return $this->belongsTo(User::class);
      }
  
      public function ownedBy(User $user) 
      {
          return $user->id === $this->user_id;
      }
}

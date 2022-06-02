<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'section'
    ];

    public function post()
    {
        $this->belongsTo(Post::class);
    }

    public static function getNameById($id){
        return Category::where('id', $id)->pluck('section')->first();
    }
}

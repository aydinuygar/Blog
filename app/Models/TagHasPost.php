<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagHasPost extends Model
{
    use HasFactory;
    protected $fillable = ['tag_id', 'post_id'];
    
    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}

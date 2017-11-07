<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class Tag extends Model
{
    protected $fillable = [
    	'id', 'name', 'slug'
    ];

    public function posts(){
    	return $this->belongsToMany(Post::class, 'post_tags', 'post_id', 'tag_id');
    }
}

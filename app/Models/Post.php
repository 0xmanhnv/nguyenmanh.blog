<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable =[
    	'id', 'title', 'thumnbail', 'description', 'content', 'slug', 'user_id', 'category_id', 'status'
    ];
}

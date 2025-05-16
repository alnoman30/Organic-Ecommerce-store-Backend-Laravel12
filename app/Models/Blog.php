<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    public function blog_category(){
        return $this->belongsTo(BlogCategory::class, 'blog_category_id');
    }
}

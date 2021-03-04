<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded =[];


    public function categories(){

        return $this->belongsToMany(Category::class);
    }


    public function path($path = 'post.index'){

        if($path != 'post.index'): 
            $path = 'post.'.$path;
        endif;

        return route($path, $this);
    }
}

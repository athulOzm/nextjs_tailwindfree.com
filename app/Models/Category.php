<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'parant_id', 'slug', 'order'];

    public function posts(){

        return $this->belongsToMany(Post::class)->withTimestamps();
    }

    public function parant(){

        return $this->belongsTo(Category::class, 'parant_id');
    }
    public function childs(){

        return $this->hasMany(Category::class, 'parant_id');
    }

    
 
}

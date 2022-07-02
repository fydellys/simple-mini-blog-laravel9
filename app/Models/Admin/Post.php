<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = [
        'title',
        'description',
        'content',
        'slug',
        'author_id',
        'category_id',
        'image',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class,'author_id','id');
    }

    public function category()
    {
        return $this->belongsTo(\App\Models\Admin\Category::class,'category_id','id');
    }

}

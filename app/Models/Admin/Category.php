<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'category';

    protected $fillable = [
        'name',
        'description',
        'image',
    ];

    public function post()
    {
        return $this->belongsTo(\App\Models\Admin\Post::class, 'category_id', 'id');
    }

    public function verify_post_category($id)
    {
        if (\App\Models\Admin\Post::where('category_id', $id)->first()) {
            return true;
        } else {
            return false;
        }
    }
}

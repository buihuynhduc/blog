<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;
    protected $table='posts';
    protected $fillable=[
        'title',
        'description',
        'content',
        'image',
        'view_count',
        'user_id',
        'category_id',
        'slug',
        'highlight_post',
        'new_post'
    ];
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }

}

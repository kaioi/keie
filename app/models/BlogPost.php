<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//claseOrmDeEloquent

class BlogPost extends Model {
    protected $table= 'blog_post';
    protected $fillable=['title','contenido'];
}
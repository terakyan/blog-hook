<?php

namespace Terakyan\Blog\Models;

use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    protected $table = 'posts';

    protected $guarded = ['id'];
}

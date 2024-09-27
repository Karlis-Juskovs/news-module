<?php

namespace Karlis\Module1\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'title',
        'content'
    ];
}

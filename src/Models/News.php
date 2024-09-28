<?php

namespace Karlis\Module1\Models;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Karlis\Module1\database\factories\NewsFactory;

class News extends Model
{

    protected $fillable = [
        'title',
        'content'
    ];

    /**
     * Create a new factory instance for the model.
     *
     * @return Factory
     */
    protected static function newFactory(): NewsFactory
    {
        return NewsFactory::new();
    }

    public static function test()
    {
        echo "TEST string v.3 \n";
    }
}

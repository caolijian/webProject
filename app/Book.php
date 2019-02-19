<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'desc',
        'picture',
        'author',
        'content'
    ];

    public function article()
    {
        return $this->hasMany(Article::class);
    }
}

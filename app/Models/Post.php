<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * @property-read int $id
 * @property string $name
 * @property string $text
 * @property string $image
 **/
class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'text',
        'image'
    ];

    public function comments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Comment::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [

        'user_id', 
        'title', 'content',
        'published', 'published_at',

    ];

    protected $casts = [
        'published_at' => 'datetime',
        'published' => 'boolean',
    ];

    public static function getRules(): array
    {
        return [
            'title' => ['required', 'string', 'max:100'],
            'content' => ['required', 'string', 'max:100000'],
        ];
    } 
    
}

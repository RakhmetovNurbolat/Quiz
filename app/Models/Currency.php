<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;

    public $incrementing = false;// off table auto
    protected $fillable = [
        'id', 'name', 'price', 
        'active', 'active_at', 'sort',
    ];

    protected $hidden = [
        'price',
    ];

    protected $casts = [
        'price' => 'float',
        'active' => 'boolean',
    ];

    protected $dates =[
        'active_at',
    ];

}

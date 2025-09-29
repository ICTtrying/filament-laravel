<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
    ];

    // Uncomment to use route model binding by slug
    // public function getRouteKeyName(): string
    // {
    //     return 'slug';
    // }
}

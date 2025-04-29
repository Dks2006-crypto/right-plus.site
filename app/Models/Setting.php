<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'logo',
        'favicon',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];
}

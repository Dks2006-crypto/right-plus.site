<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class lawyer extends Model
{
    protected $table = 'lawyers';

    protected $guarded = [];

    protected $casts = [
        'is_active' => 'boolean',
        'certificates' => 'array',
    ];

    public function applications()
    {
        return $this->hasMany(Application::class);
    }
}

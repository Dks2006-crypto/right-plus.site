<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $table = 'applications';

    protected $fillable = [
        'name',
        'phone',
        'email',
        'description',
        'status'
    ];

    public function lawyer(){
        return $this->belongsTo(lawyer::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'price'
    ];

    public function agents()
    {
        return $this->belongsToMany(Agent::class)->withPivot('role');
    }

}


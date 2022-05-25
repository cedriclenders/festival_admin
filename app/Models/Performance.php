<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Performance extends Model
{
    use HasFactory;

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function performer()
    {
        return $this->belongsTo(Performer::class);
    }
    
}

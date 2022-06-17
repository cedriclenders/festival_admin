<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Festival extends Model
{
    use HasFactory;
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['start_date', 'end_date'];

    public function user()
    {
        return $this->belongsTo(User::class, 'foreign_key');
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }
}

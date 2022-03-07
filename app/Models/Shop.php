<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shop extends Model
{
    use SoftDeletes;

    public function user()
    {
        return $this->belongsTo( User::class );
    }

    public function items()
    {
        return $this->belongsToMany( Item::class );
    }
}

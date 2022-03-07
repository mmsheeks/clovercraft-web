<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use SoftDeletes;

    public function pages()
    {
        return $this->hasMany( Page::class );
    }

    public function users()
    {
        return $this->belongsToMany( User::class )->withPivot( 'role' );
    }
}

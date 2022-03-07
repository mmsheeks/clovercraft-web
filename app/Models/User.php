<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    use SoftDeletes;

    public function posts()
    {
        return $this->hasMany( Post::class );
    }

    public function books()
    {
        return $this->belongsToMany( Book::class )->withPivot( 'role' );
    }

    public function shops()
    {
        return $this->hasMany( Shop::class );
    }

    public function attachments()
    {
        return $this->hasMany( Attachment::class );
    }

    public function role( $role = '' )
    {
        $roles = config( "discord.roles" );
        $user_roles = explode( ",", $this->roles );

        // if a role is provided, test for a specific role
        if( $role !== '' ) return in_array( $roles[ $role ], $user_roles );

        // otherwise get a list of user roles and return it
        $out = [];
        foreach( $user_roles as $role ) {
            $out[] = [
                'id' => $role,
                'name' => array_search( $role, $roles )
            ];
        }
        return $out;
    }
}

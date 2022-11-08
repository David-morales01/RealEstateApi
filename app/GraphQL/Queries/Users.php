<?php

namespace App\GraphQL\Queries;

use App\Models\User;

final class Users
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function allUsers($_, array $args)
    {
        $users = User::all()->where('rol', '<>', 'superAdmin');

        return $users;
    }
}

<?php

namespace App\GraphQL\Mutations;

use App\Models\User;

final class Register
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $data = $args;
 
        $data['rol'] = 'user';

        $user = User::create(
            array_merge($data, ['password' => bcrypt($data['password'])])
        );

        return $user->createToken('shortener-app')->plainTextToken;
    }
}

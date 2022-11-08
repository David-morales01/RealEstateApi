<?php

namespace App\GraphQL\Mutations;

use App\Models\User; 

final class LoginGoogle
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $data = $args;
 
        $data['picture'] =   'picture'; 
        $data['rol'] = 'user';  

        $user = User::where('email', $args['email'])->first();

        if (! $user) {
         
            $newUSer = User::create($data);
            return $newUSer->createToken('shortener-app')->plainTextToken;
        }

        
        return $user->createToken('shortener-app')->plainTextToken;
    }
}

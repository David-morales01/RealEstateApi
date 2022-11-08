<?php

namespace App\GraphQL\Mutations;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

final class Login
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $user = User::where('email', $args['email'])->first();

        if (! $user || ! Hash::check($args['password'], $user->password)) {
            throw ValidationException::withMessages(
                [
                    'requestError' => ['The provided credentials are incorrect.'],
                ]
            );
        }

        $user->tokens()->delete();
        return $user->createToken('shortener-app')->plainTextToken;
    }
}

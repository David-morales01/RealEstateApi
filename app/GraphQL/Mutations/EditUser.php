<?php

namespace App\GraphQL\Mutations;

use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

final class EditUser
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function editUserAndImage($_, array $args)
    {
        $data['email'] = $args['email'];
        $data['name'] = $args['name'];

        $user = User::findOrFail($args['id']);
        if ($args['password'] != null) {
            $data['password'] = bcrypt($data['password']);
        }

        if ($args['img_user'] != []) {
            Storage::delete($user->img_user);
            $imageUser = $args['img_user'];
            //   /** @var UploadedFile $image */
            //   $tempImage= $image->store('images/users','public');
            //   $data['img_user']=  $tempImage;
            /** @var UploadedFile $image */
            foreach ($imageUser ?? [] as $image) {
                $tempImage = $image->store('images/users', 'public');
                $data['img_user'] = $tempImage;
            }
        }
        $user->update($data);

        return $user;
    }
}

<?php

namespace App\GraphQL\Mutations;

use App\Models\Marker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;

final class CreateMarker
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function createMarkersAndImages($_, array $args)
    {
        $auth_id = Auth::id();
        $data['title'] = $args['title'];
        $data['description'] = $args['description'];
        $data['bedroom'] = $args['bedroom'];
        $data['bathdroom'] = $args['bathdroom'];
        $data['price'] = $args['price'];
        $data['lat'] = $args['lat'];
        $data['business_types_id'] = $args['business_types_id'];
        $data['long'] = $args['long'];
        $data['user_id'] = $auth_id;
        $data['owner_id'] = null;
        $data['status'] = true;
        $imageList = $args['images'];
        $marker = Marker::create($data)->fresh();
        if ($imageList != null) {
            /** @var UploadedFile $image */
            foreach ($imageList ?? [] as $image) {
                $tempImage = $image->store('images/markers', 'public');
                $newImage['src_img'] = $tempImage;
                $marker->images()->Create($newImage);
            }
        }
        $marker->load('images');

        return $marker;
    }
}

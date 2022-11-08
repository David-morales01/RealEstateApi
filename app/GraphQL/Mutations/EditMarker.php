<?php

namespace App\GraphQL\Mutations;

use App\Models\Marker;

final class EditMarker
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    // public function __invoke($_, array $args)
    // {
    //     // TODO implement the resolver
    // }

    public function editMarkersAndImages($_, array $args)
    {
        $data['title'] = $args['title'];
        $data['description'] = $args['description'];
        $data['bedroom'] = $args['bedroom'];
        $data['bathdroom'] = $args['bathdroom'];
        $data['price'] = $args['price'];
        $data['lat'] = $args['lat'];
        $data['business_types_id'] = $args['business_types_id'];
        $data['long'] = $args['long'];
        $marker = Marker::findOrFail($args['id']);
        $imageList = $args['images'];

        $marker->update($data);
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

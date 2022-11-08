<?php

namespace App\GraphQL\Queries;

use App\Models\Marker;

final class FilterMarker
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function filterMarkers($_, array $args)
    {
        $title = $args['title'];
        $priceRange = $args['priceRange'];
        $bedroom = $args['bedroom'];
        $bathdroom = $args['bathdroom'];
        $businessTypesId = $args['businessTypesId'];

        $marker = Marker::query()

        ->when($businessTypesId,
            function ($query, $businessTypesId) {
                $query->whereIn('business_types_id', $businessTypesId);
            })
        ->when($bedroom, function ($query, $bedroom) {
            ($bedroom == 5) ? $query->where('bedroom', '>', 1) : $query->where('bedroom', '<=', $bedroom);
        })
        ->when($bathdroom,
            function ($query, $bathdroom) {
                ($bathdroom == 5) ? $query->where('bathdroom', '>', 1) : $query->where('bathdroom', '<=', $bathdroom);
            })
        ->when($priceRange, function ($query, $priceRange) {
            $query->whereBetween('price', $priceRange);
        })
        ->when($title, function ($query, $title) {
            $query->where('title', 'like', "%$title%");
        })->get();

        return $marker;
    }
}

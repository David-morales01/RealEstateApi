<?php

namespace Database\Factories;

use App\Models\Marker;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $image = 'images/markers/imgMarker'.rand(1, 5).'.png';

        return [

            'marker_id' => Marker::inRandomOrder()->first()->id,
            'src_img' => $image,
        ];
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MarkerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //'user_id' => User::inRandomOrder()->first()->id,
       
        DB::table('markers')->insert(
            [
                'user_id' => 3,
                'title' => 'Chipote  House',
                'description' => 'House for those recently out of chipote',
                'bedroom' => rand(1, 10),
                'bathdroom' => rand(1, 10),
                'price' => rand(500, 6000),
                'long' => '-86.27419710159302',
                'lat' => '12.140819668287174',
                'business_types_id' => 1,
                'status' => true,
                'created_at' => now(),
                'owner_id' => null,
            ]
        );

        DB::table('markers')->insert(
            [
                'user_id' => 3,
                'title' => 'Monseñor departments',
                'description' => 'houses for the people of my good government',
                'bedroom' => rand(1, 10),
                'bathdroom' => rand(1, 10),
                'price' => rand(500, 6000),
                'long' => '-86.29731237888336',
                'lat' => '12.147049984859208',
                'business_types_id' => 3,
                'status' => false,
                'created_at' => now(),
                'owner_id' => 1,
            ]
        );

        DB::table('markers')->insert(
            [
                'user_id' => 2,
                'title' => 'Metrocentro shopping center',
                'description' => 'Most popular shopping center in managua',
                'bedroom' => rand(1, 10),
                'bathdroom' => rand(1, 10),
                'price' => rand(500, 6000),
                'long' => '-86.26501590013504',
                'lat' => '12.128072762712032',
                'business_types_id' => 2,
                'status' => true,
                'created_at' => now(),
                'owner_id' => null,
            ]
        );
    }
}

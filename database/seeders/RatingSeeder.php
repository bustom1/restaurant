<?php

namespace Database\Seeders;

use App\Models\ReviewRating;
use Illuminate\Database\Seeder;

class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //data dummy
        $rating=ReviewRating::create([
            'user_id' => 3,
            'name' => 'KELOMPOK 3 ',
            'comments' => 'MANTAP, KERJA BAGUS',
            'star_rating' => 5,
            'status' => 'active',
        ]); 
    }
}

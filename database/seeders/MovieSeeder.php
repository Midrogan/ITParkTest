<?php

namespace Database\Seeders;

use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $movies = Movie::factory()
            ->count(150)
            ->create();

        foreach($movies as $movie){
            $movie->genres()->attach([rand(1,50), rand(1,50), rand(1,50)]);
        }
    }
}

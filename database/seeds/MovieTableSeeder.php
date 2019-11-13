<?php

use Illuminate\Database\Seeder;
use App\Movie;
class MovieTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $move = new \App\Movie( [
            'name'=> 'hayat',
            'year_of_release'=>'1993/06/31',
            'plot'=>'just for testing ...',
            'producer_id'=> 1

        ]);
        $movie->save();
    }
}

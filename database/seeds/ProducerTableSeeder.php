<?php

use Illuminate\Database\Seeder;

class ProducerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $actor = new \App\Actor(
            [
                'name'=> 'Epa',
                'sex'=>'female',
                'dob'=>'1993/06/31',
                'bio'=> 'she is my lovly girlfriend, its about a year we are in relation'

            ]
        );
        $actor->save();
    }
}

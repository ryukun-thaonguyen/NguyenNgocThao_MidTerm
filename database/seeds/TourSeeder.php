<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;
class TourSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run(Faker $faker)
    {
        for($i=0;$i<10;$i++){
             DB::table('tours')->insert(
                 [
                    'name'=>$faker->name,
                    'image'=>"storage/public/5ee39f4f3c964. jpeg",
                    'typetour'=>$faker->city,
                    'schedule'=>$faker->dateTime(),
                    'depart'=>$faker->date('Y-m-d'),
                    'numberPeople'=>random_int(1,20),
                    'price'=>random_int(200000,1000000)
                 ]
                 );
        }
    }
}

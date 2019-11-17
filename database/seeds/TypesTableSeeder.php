<?php

use Illuminate\Database\Seeder;
use App\Type;
class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->truncate();
        $faker = \Faker\Factory::create();
        foreach(range(1,50) as $index){
            Type::create([
                'name' => $faker->name
            ]);
        }
    }
}

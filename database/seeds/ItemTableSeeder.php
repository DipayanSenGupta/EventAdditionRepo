<?php

use Illuminate\Database\Seeder;

class ItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('items')->insert([
        	'menu_id' => 1,
        	'name' => 'Chinese Chicken'
        ]);
        \DB::table('items')->insert([
        	'menu_id' => 1,
        	'name' => 'Chinese Rice'
        ]);
        \DB::table('items')->insert([
        	'menu_id' => 1,
        	'name' => 'Chinese Fish'
        ]);   

        \DB::table('items')->insert([
        	'menu_id' => 2,
        	'name' => 'Korean Chicken'
        ]);
        \DB::table('items')->insert([
        	'menu_id' => 2,
        	'name' => 'Korean Rice'
        ]);
        \DB::table('items')->insert([
        	'menu_id' => 2,
        	'name' => 'Korean Fish'
        ]); 

        \DB::table('items')->insert([
        	'menu_id' => 3,
        	'name' => 'Indian Chicken'
        ]);
        \DB::table('items')->insert([
        	'menu_id' => 3,
        	'name' => 'Indian Rice'
        ]);
        \DB::table('items')->insert([
        	'menu_id' => 3,
        	'name' => 'Indian Fish'
        ]); 
    }
}

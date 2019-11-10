<?php

use Illuminate\Database\Seeder;

class EventMenuItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('event_menu_items')->truncate();

        \DB::table('event_menu_items')->insert([
        	'event_menu_id' => 1,
        	'name' => 'Chinese Chicken'
        ]);
        \DB::table('event_menu_items')->insert([
        	'event_menu_id' => 1,
        	'name' => 'Chinese Rice'
        ]);
        \DB::table('event_menu_items')->insert([
        	'event_menu_id' => 1,
        	'name' => 'Chinese Fish'
        ]);   

        \DB::table('event_menu_items')->insert([
        	'event_menu_id' => 2,
        	'name' => 'Korean Chicken'
        ]);
        \DB::table('event_menu_items')->insert([
        	'event_menu_id' => 2,
        	'name' => 'Korean Rice'
        ]);
        \DB::table('event_menu_items')->insert([
        	'event_menu_id' => 2,
        	'name' => 'Korean Fish'
        ]); 

        \DB::table('event_menu_items')->insert([
        	'event_menu_id' => 3,
        	'name' => 'Indian Chicken'
        ]);
        \DB::table('event_menu_items')->insert([
        	'event_menu_id' => 3,
        	'name' => 'Indian Rice'
        ]);
        \DB::table('event_menu_items')->insert([
        	'event_menu_id' => 3,
        	'name' => 'Indian Fish'
        ]);       
    }
}

<?php

use Illuminate\Database\Seeder;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        \DB::table('menus')->insert([
            'name' => 'Chinese',
        ]);
        \DB::table('menus')->insert([
        	'name' => 'Korean',
        ]);
        \DB::table('menus')->insert([
        	'name' => 'Indian',
        ]);
    }
}

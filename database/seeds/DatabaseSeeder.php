<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(MenuTableSeeder::class);
        // $this->call(ItemTableSeeder::class);
        
        // $this->call(EventMenuTableSeeder::class);
        // $this->call(EventMenuItemTableSeeder::class);
        $this->call(TypesTableSeeder::class);


    }
}

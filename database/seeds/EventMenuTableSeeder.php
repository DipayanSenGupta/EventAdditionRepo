<?php

use Illuminate\Database\Seeder;

class EventMenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        DB::table('event_menus')->truncate();
        $int= rand(1262055681,1262055681);
        $randDate = date("Y-m-d H:i:s",$int);
        \DB::table('event_menus')->insert([
            'name' => 'Chinese Event',
            'type' => 'Bia', 
            'venue' => 'PSC',
            'attendences' => 900,
            'booking_time' =>  $randDate,
            'event_time' => $randDate,
        ]);
        $int= rand(1262055681,1262055681);
        $randDate = date("Y-m-d H:i:s",$int);
        \DB::table('event_menus')->insert([
            'name' => 'Korean Event',
            'type' => 'holud', 
            'venue' => 'RAWA',
            'attendences' => 900,
            'booking_time' =>  $randDate,
            'event_time' => '2019-05-15 11:06',
        ]);
        \DB::table('event_menus')->insert([
            'name' => 'Indian Event',
            'type' => 'Bia', 
            'venue' => 'PSC',
            'attendences' => 400,
            'booking_time' =>  '2019-05-19 11:06',
            'event_time' => '2019-05-29 11:06',
        ]); 
    }
}

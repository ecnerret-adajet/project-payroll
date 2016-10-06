<?php

use Illuminate\Database\Seeder;

class BasicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          DB::table('basics')->insert([
          array('position'=>'Reviser', 'salary' => '0' ),
          array('position'=>'Clothing Packer', 'salary' => '0'),
          array('position'=>'Driver', 'salary' => '0' )
        ]);
    }
}

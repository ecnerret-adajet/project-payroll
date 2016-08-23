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
          array('position'=>'Reviser', 'salary' => '2724' ),
          array('position'=>'Clothing Packer', 'salary' => '2724'),
          array('position'=>'Driver', 'salary' => '2724' )
        ]);
    }
}

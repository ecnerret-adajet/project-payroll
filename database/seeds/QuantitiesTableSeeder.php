<?php

use Illuminate\Database\Seeder;

class QuantitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('quantities')->insert([
          array('position'=>'Placket','salary'=>'5'),
          array('position'=>'Collar','salary'=>'5'),
          array('position'=>'Piping shoulder','salary'=>'5'),
          array('position'=>'Piping bottom','salary'=>'5'),
          array('position'=>'Buttons hole','salary'=>'4'),
          array('position'=>'Buttons sewer','salary'=>'4'),
          array('position'=>'Edging','salary'=>'4'),
          array('position'=>'Slit','salary'=>'4'),
          array('position'=>'Trimmer','salary'=>'4')
        ]);
    }
}

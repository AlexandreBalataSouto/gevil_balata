<?php

use Illuminate\Database\Seeder;

class SeguimientoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         factory(\App\Seguimiento::class, 10)->create();
    }
}

<?php

use Illuminate\Database\Seeder;

class EspeciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Especie::class, 12)->create();
    }
}

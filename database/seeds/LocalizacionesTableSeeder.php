<?php

use Illuminate\Database\Seeder;

class LocalizacionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Localizacion::class, 10)->create();
    }
}

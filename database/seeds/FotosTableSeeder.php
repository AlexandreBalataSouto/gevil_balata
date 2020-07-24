<?php

use Illuminate\Database\Seeder;

class FotosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Foto::class, 12)->create();
    }
}

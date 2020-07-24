<?php

use Illuminate\Database\Seeder;

class MetodosControlTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\MetodoControl::class, 5)->create();
    }
}

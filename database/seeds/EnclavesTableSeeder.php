<?php

use Illuminate\Database\Seeder;

class EnclavesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Enclave::class, 10)->create();
    }
}

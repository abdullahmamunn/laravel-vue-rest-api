<?php

use Illuminate\Database\Seeder;

class ArticalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       factory(App\Artical::class,10)->create();
    }
}

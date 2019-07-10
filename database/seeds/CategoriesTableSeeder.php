<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->truncate();

        factory('App\Domain\Entities\Category', 100)->create();
    }
}

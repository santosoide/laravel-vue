<?php

use Illuminate\Database\Seeder;

class SubscriberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subscribers_list')->truncate();
        factory('App\Domain\Entities\Subscriber', 100)->create();
    }
}

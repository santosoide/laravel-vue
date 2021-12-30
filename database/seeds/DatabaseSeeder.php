<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(SubscriberTableSeeder::class);
        $this->call(ChannelsTableSeeder::class);
         $this->call(RolesTableSeeder::class);
         $this->call(CustomersTableSeeder::class);
    }
}

<?php

use App\Domain\Entities\Customer;
use Faker\Generator as Faker;

$factory->define(Customer::class, function (Faker $faker) {
    return [
        'id'                       => $faker->uuid,
        'channel_id'               => $faker->uuid,
        'first_name'               => $faker->firstName(),
        'last_name'                => $faker->LastName(),
        'gender'                   => $faker->randomElement($array = array ('man','woman')),
        'email'                    => $faker->unique()->safeEmail,
        'status'                   => $faker->randomNumber(2),
        'password'                 => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'subscribed_to_news_letter'=> $faker->randomNumber(2),
        'is_verified'              => $faker->randomNumber(2),
        'notes'                    => $faker->realText($maxNbChars = 200, $indexSize = 2),
    ];
});

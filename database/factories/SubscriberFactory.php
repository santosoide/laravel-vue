<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Domain\Entities\Subscriber;
use Faker\Generator as Faker;

$factory->define(Subscriber::class, function (Faker $faker) {
    return [
        'id'                => $faker->uuid,
        'email'             => $faker->unique()->safeEmail,
        'id_subscribed'      => $faker->uuid,
        'chanel_id'         => $faker->uuid,
    ];
});

<?php


$factory->define(App\Book::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence(3,true),
        'description' => $faker->sentence(6,true),
        'price' => $faker->NumberBetween(25,150),
        'author_id' => $faker->NumberBetween(1,50),
    ];
});

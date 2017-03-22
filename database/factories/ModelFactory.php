<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'status' => 'active',
        'role' => 'administrator',
        'email' => $faker->safeEmail,
        'phone_number' => $faker->tollFreePhoneNumber,
        'password' => bcrypt(str_random(10)),
    ];
});



$factory->define(App\Company::class, function (Faker\Generator $faker) {
    return [
        'name'          => $faker->company,
        'rif'           => $faker->numerify('J ###'),
        'email'         => $faker->safeEmail,
        'web'           => $faker->safeEmailDomain,
        'phone_number'  => $faker->tollFreePhoneNumber,
        'address'       => $faker->address,
        'owner'         => $faker->name,
        'status'        => 'active'
    ];
});


$factory->define(App\Driver::class, function (Faker\Generator $faker) {
    return [
        'id'            => $faker->randomNumber,
        'name'          => $faker->name,
        'phone_number'  => $faker->tollFreePhoneNumber,
        'category'      => $faker->randomElement(['1', '2']),
        'type'          => $faker->randomElement(['Interno', 'Registrado']),
        'status'        => 'active'
    ];
});


$factory->define(App\Tabulator::class, function (Faker\Generator $faker) {
    return [
        'km'            => $faker->randomFloat(2, 20, 40),
        'wait'          => $faker->randomFloat(2, 400, 600),
        'disposition'   => $faker->randomFloat(2, 800, 1100),
        'sprint'        => $faker->randomFloat(2, 800, 1000),
        'overnight'     => $faker->randomFloat(2, 400, 600),
        'detour'        => $faker->randomFloat(2, 20, 40),
        'shipping'      => $faker->randomFloat(2, 20, 40),
        'night'         => $faker->randomFloat(2, 2, 4),
        'holiday'       => $faker->randomFloat(2, 2, 4),
        'category'      => $faker->randomElement(['1', '2']),
        'status'        => 'active',
    ];
});


$factory->define(App\Subsidiary::class, function (Faker\Generator $faker) {
    return [
        'name'    => $faker->company,
        'rif'     => 'J-'.$faker->randomNumber(9),
        'status'  => 'active',
    ];
});

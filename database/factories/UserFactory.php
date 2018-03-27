<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
	$firstName = $faker->firstName;
    $lastName = $faker->lastName;
    return [
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt($faker->password(6)), // secret
        'fullname' => $firstName." ".$lastName,
        'gender' => rand(0, 1) ? 'male' : 'female',
        'birthday' => date('Y-m-d', rand(1, time())),
        'phone' => "0".str_random(9),
        'level' => rand(0, 1),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Customer::class, function (Faker $faker) {
	$firstName = $faker->firstName;
    $lastName = $faker->lastName;
    return [
        'fullname' => $firstName." ".$lastName,
        'gender' => rand(0, 1) ? 'male' : 'female',
        'birthday' => date('Y-m-d', rand(1, time())),
        'email' => $faker->unique()->safeEmail,
        'address' => $faker->sentence(20),
        'phone' => "0".str_random(9)
    ];
});

$factory->define(App\Product::class, function (Faker $faker) {
    $users = App\User::all()->pluck('id')->toArray();
    $user_id = $faker->randomElement($users);
    $categories = App\Category::all()->pluck('id')->toArray();
    $cate_id = $faker->randomElement($categories);
    $name = $faker->sentence(5);
    return [
        'name' => $name,
        'alias' => $name,
        'price' => rand(1000, 999999),
        'promotion_price' => rand(1000, 999999),
        'promotion_item' => $faker->sentence(5),
        'summary' => $faker->sentence(10),
        'detail' => $faker->sentence(20),
        'tags' => $faker->sentence(3).", ".$faker->sentence(3).", ".$faker->sentence(3),
        'today' => rand(0, 1),
        'user_id' => $user_id,
        'cate_id' => $cate_id,
    ];
});

$factory->define(App\Category::class, function (Faker $faker) {
    $name = $faker->sentence(3);
    return[
        'name' => $name,
        'alias' => $name,
    ];
});

$factory->define(App\ProductImg::class, function (Faker $faker) {
	$products = App\Product::all()->pluck('id', 'name')->toArray();
	$product_id = $faker->randomElement($products);
    return [
        'name' => $product_id['name'],
        'product_id' => $product_id['id'],
    ];
});





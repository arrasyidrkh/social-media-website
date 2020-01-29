<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\User;
use Carbon\Carbon;

$factory->define(Model::class, function (Faker $faker) {
    return [
        DB::table('post')->insert([
          'user_id' => rand(1,$data),
          'caption' => Str::random(10),
          'image' => $faker->image('public/img',400,300),
        ])
    ];
});

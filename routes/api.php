<?php

use App\Models\User;
use Faker\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get("/store", function () {
    $faker = Factory::create();
    User::create([
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt('password')
    ]);
});

Route::get("/users", function () {
    return User::all();
});

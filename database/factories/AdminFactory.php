<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\Models\Admin;

class AdminFactory extends Factory
{
    public function definition(){
        return [
            'name' => "Mazouzi Saad",
            'email' => "saad.mazouzi@esi.ac.ma",
            'email_verified_at' => now(),
            'password' => Hash::make("admin"), // password
            'remember_token' => Str::random(10),
        ];
    }
}
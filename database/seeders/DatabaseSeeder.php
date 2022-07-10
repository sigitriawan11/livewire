<?php

namespace Database\Seeders;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Contact::factory(10)->create();

        User::create([
            "name" => "Sigit",
            "email" => "fcpanjul6@gmail.com",
            "password" => Hash::make('password')
        ]);
    }
}

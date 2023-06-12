<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {

        // Category::factory(6)->create();
        Product::factory(15)->create();

        // User::create( [
        //     "name"       => 'User',
        //     'email'      => 'user@gmail.com',
        //     'password'   => Hash::make( 12345678 ),
        // ] );

    }
}

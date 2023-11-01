<?php

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Product;
use App\Models\Sale;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {

        Category::factory(5)->create();
        Product::factory(20)->create();
        Sale::factory(1)->create();
        Setting::factory(1)->create();

        User::create([
            "name"     => 'Admin',
            'email'    => 'admin@mail.com',
            'password' => Hash::make(12345678),
        ]);

    }
}

<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Products;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory(50)->create();
        // Products::factory(100)->create();

        User::insert([
            'name' => 'Admin',
            'address' => 'aaaaa',
            'numberPhone' => '0813',
            'username' => 'admin',
            'password' => Hash::make('root'),
        ]);

        Category::insert([
            'name' => 'Laptop'
        ]);

        Category::insert([
            'name' => 'Handphone'
        ]);

        Category::insert([
            'name' => 'Tablet'
        ]);

        Category::insert([
            'name' => 'Komputer'
        ]);

        Category::insert([
            'name' => 'Printer'
        ]);
    }
}

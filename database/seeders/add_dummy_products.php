<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class add_dummy_products extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('type')->insert([
            ['type' => 'Weapon'],
            ['type' => 'Equipment'],
            ['type' => 'Relic'],
            ['type' => 'Consumable'],
            ['type' => 'Miscellaneous'],
        ]);
        // Add some dummy products
        DB::table('products')->insert([
            [
                'name' => 'Product 1',
                'description' => 'This is a weapon',
                'price' => 10.00,
                'amount_available' => 100,
                'type' => 1,
                'image' => 'product1.jpg',
            ],
            [
                'name' => 'Product 2',
                'description' => 'This is an equipment',
                'price' => 20.00,
                'amount_available' => 200,
                'type' => 2,
                'image' => 'product2.jpg',
            ],
            [
                'name' => 'Product 3',
                'description' => 'This is a relic',
                'price' => 30.00,
                'amount_available' => 300,
                'type' => 3,
                'image' => 'product3.jpg',
            ],
            [
                'name' => 'Product 4',
                'description' => 'This is a consumable',
                'price' => 40.00,
                'amount_available' => 400,
                'type' => 4,
                'image' => 'product4.jpg',
            ],
            [
                'name' => 'Product 5',
                'description' => 'This is a misc product',
                'price' => 50.00,
                'amount_available' => 500,
                'type' => 5,
                'image' => 'product5.jpg',
            ],
        ]);

        // Add types

    }
}

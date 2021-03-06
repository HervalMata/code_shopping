<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(ProductInputTableSeeder::class);
        $this->call(ProductOutputsTableSeeder::class);
        $this->call(ProductPhotosTableSeeder::class);
        $this->call(ChatGroupsTableSeeder::class);
    }
}

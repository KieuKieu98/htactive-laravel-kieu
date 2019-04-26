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
        Eloquent::unguard();
        $this->call([
              UsersTableSeeder::class,
              CategoriesTableSeeder::class,
              ServicesTableSeeder::class,
              BlogsTableSeeder::class,
              AboutsTableSeeder::class,
              ChoosesTableSeeder::class,
              PortfolioSeeder::class
            ]);
    }
}

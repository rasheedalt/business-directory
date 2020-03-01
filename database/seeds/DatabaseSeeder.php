<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Business;
use App\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(User::class, 1)->create();
        factory(Business::class, 10)->create();
        factory(Category::class, 10)->create();
    }
}

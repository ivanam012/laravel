<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\BooksSeeder;
use Database\Seeders\UserSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $ps = new BooksSeeder();
        $ps->run();

        $us = new UserSeeder();
        $us->run();
    }
}

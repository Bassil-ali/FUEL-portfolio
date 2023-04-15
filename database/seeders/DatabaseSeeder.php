<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            PermissionsDemoSeeder::class,
            AdminSeeder::class,
            LanguageSeeder::class,
            SliderSeeder::class,
        ]);

    }//end of run

}//en dof class
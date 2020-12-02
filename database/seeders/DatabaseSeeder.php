<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\User;
use App\Models\Volum;
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
        // \App\Models\User::factory(10)->create();
        User::create([
            'username' => 'Admin',
            'email' => 'admin@email.com',
            'password' => bcrypt('Admin')
        ]);
        Author::factory(30)->create()->each(function($author){
            $volumes  = Volum::factory(10)->make();
            $author->volums()->saveMany($volumes);
        });

    }
}

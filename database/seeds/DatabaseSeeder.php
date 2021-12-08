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
        $user = new\App\User;
        $user->name = "Fahmi Nuradi";
        $user->username = "admin";
        $user->email = "admin@spp.com";
        $user->level = "administrator";
        $user->password = \Hash::make("admin123");
        $user->save();
        $this->command->info("User ditambahkan");
    }
}

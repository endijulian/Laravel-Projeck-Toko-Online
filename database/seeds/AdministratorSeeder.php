<?php

use Illuminate\Database\Seeder;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\User();
        $user->username = "admin";
        $user->name = "Endi Julian";
        $user->email = "endijulian080798@gmail.com";
        $user->password = \Hash::make("julian1998");
        $user->level = "admin";

        $user->save();

        $this->command->info("User admin berhasil dibuat");
    }
}

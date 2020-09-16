<?php

use Illuminate\Database\Seeder;

class AddUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = new \App\User();
        $user1->username = "rangga";
        $user1->name = "Rangga";
        $user1->email = "rangga@gmail.com";
        $user1->password = \Hash::make("rangga");
        $user1->level = "staff";
        $user1->save();

        $user2 = new \App\User();
        $user2->username = "rifandi";
        $user2->name = "Rifandi";
        $user2->email = "rifandi@gmail.com";
        $user2->password = \Hash::make("rifandi");
        $user2->level = "staff";
        $user2->save();

        $user3 = new \App\User();
        $user3->username = "gondrong";
        $user3->name = "Gondrong";
        $user3->email = "gondrong@gmail.com";
        $user3->password = \Hash::make("gondrong");
        $user3->level = "staff";
        $user3->save();

        $this->command->info("User dibuat");
    }
}

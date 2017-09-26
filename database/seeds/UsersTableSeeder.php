<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('users')->truncate();

        DB::table('users')->insert([
            "role_id" => 3,
            "name" => "epfc",
            "email" => "epfc@example.io",
            "password" => bcrypt("epfc12"),
            "created_at" => new DateTime(),
            "updated_at" => new DateTime()
        ]);
    }

}

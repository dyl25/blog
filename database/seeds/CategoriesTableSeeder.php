<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder {

    /**
     * Run the roles seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('categories')->truncate();

        DB::table('categories')->insert([
            'name' => "News",
        ]);
        DB::table('categories')->insert([
            'name' => "Sport",
        ]);
        DB::table('categories')->insert([
            'name' => "Divertissement",
        ]);
               
    }

}

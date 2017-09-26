<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //on supprime la verification des clés étrangères
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        
         $this->call(RolesTableSeeder::class);
         $this->call(CategoriesTableSeeder::class);
         $this->call(UsersTableSeeder::class);
         $this->call(ArticlesTableSeeder::class);
         
         //reactivation de la verification des clés étrangères
         DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}

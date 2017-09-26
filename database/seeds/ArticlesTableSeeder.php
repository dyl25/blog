<?php

use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('articles')->truncate();

        for ($i = 0; $i <= 20; $i++) {
            DB::table('articles')->insert([
                "category_id" => rand(1, 3),
                "user_id" => 1,
                "title" => "Article numéro " . $i,
                "slug" => str_slug("Article numéro " . $i, '-'),
                "content" => "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.",
                "created_at" => new DateTime(),
                "updated_at" => new DateTime()
            ]);
        }
    }

}

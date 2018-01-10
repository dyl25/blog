<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateValidationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('validations');
        Schema::create('validations', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('article_id')->unsigned();
            $table->foreign('article_id')->references('id')->on('articles');
            $table->unique('article_id'); //un article ne peut être validé que 1 fois
            $table->integer('validator_id')->unsigned();
            $table->foreign('validator_id')->references('id')->on('users');
            $table->tinyInteger('status');
            $table->text('justification')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('validations', function ($table) {
            $table->dropForeign('validations_article_id_foreign');
            $table->dropForeign('validations_validator_id_foreign');
        });
        Schema::dropIfExists('validations');
    }
}

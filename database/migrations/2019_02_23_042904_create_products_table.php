<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index()->nullable();
            $table->integer('category_id')->unsigned()->index()->nullable();
            $table->integer('photo_id')->unsigned()->index()->nullable();
            $table->integer('pic_id')->unsigned()->index()->nullable();
            $table->string('title');
            $table->string('related_pics_ids');
            $table->string('related_video_links');
            $table->integer('video_category_id')->unsigned()->index()->nullable();
            $table->integer('price');

            $table->string('gender');
            $table->string('age_range');
            $table->string('selected_product_goals');
            $table->string('slug');
            $table->text('details');
            $table->text('description');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignId('category_id');
            $table->foreignId('user_id');
            $table->string('title');
            $table->string('short_desc');
            $table->longText('long_desc');
            $table->string('slug')->unique();
            $table->integer('views')->default(0);
            $table->date('date');
            $table->timestamps();
            $table->softDeletes();
        });
       //image
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}

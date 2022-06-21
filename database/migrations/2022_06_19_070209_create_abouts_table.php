<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('short_desc');
            $table->longText('long_desc');
            $table->string('phone')->nullable();   
		    $table->string('twitter')->nullable();   
		    $table->string('facebook')->nullable();
		    $table->string('youtube')->nullable();
            $table->string('instegram')->nullable();
            $table->string('gmail')->nullable(); 
            $table->string('address')->nullable();
            $table->string('job')->nullable();
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
        Schema::dropIfExists('abouts');
    }
}

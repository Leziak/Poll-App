<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

//This poll can have N choices (N >= 1), string name (max width 255) and string description (unlimited size).



    public function up()
    {
        Schema::create('polls', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->integer('choices');
            $table->string('name');
            $table->text('description');
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
        Schema::dropIfExists('polls');
    }
}

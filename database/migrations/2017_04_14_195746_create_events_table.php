<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('short_descr');
            $table->text('long_descr');
            $table->integer('upvote_admin');
            $table->integer('downvote_admin');
            $table->integer('isShown');
            $table->integer('isFromClub');
            $table->integer('likes');
            $table->integer('dislikes');
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
        Schema::drop('events');
    }
}

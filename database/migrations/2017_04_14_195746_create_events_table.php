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
            $table->integer('eventCreator')->references('id')->on('users');
            $table->text('short_descr');
            $table->text('long_descr');
            $table->date('eventDate');
            $table->string('eventimage')->default('http://dev.meilleures-licences.com/logo_ecole/logoexiainge-1449052490.jpg');
            $table->integer('clubID')->references('id')->on('clubs');
            $table->integer('upvote_admin');
            $table->integer('downvote_admin');
            $table->integer('isAvailable');
            $table->integer('likes')->default(0);
            $table->integer('dislikes')->default(0);
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

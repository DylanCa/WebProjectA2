<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_votes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('userID');
            $table->integer('eventID');
            $table->integer('clubID');
            $table->integer('isLiked');
            $table->integer('isDisliked');
            $table->integer('setAvailable');
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
        Schema::drop('admin_votes');
    }
}

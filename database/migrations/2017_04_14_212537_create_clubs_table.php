<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clubs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('clubCreator');
            $table->text('short_descr');
            $table->text('long_descr');
            $table->string('clubimage')->default("http://dev.meilleures-licences.com/logo_ecole/logoexiainge-1449052490.jpg");
            $table->decimal('budget',2);
            $table->decimal('totalAmount',2);
            $table->integer('upvote_admin');
            $table->integer('downvote_admin');
            $table->integer('isAvailable');
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
        Schema::drop('clubs');
    }
}

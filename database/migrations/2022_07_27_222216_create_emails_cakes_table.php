<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmailsCakesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emails_cakes', function (Blueprint $table) {
            $table->id();

            $table->integer('cake_id');
            $table->foreign('cake_id')->references('id')->on('cakes');

            $table->integer('email_id');
            $table->foreign('email_id')->references('id')->on('emails');

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
        Schema::dropIfExists('emails_cakes');
    }
}

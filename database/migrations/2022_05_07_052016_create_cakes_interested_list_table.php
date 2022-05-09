<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCakesInterestedListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cakes_interested_list', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->unsignedBigInteger('cake_id');
            $table->foreign('cake_id')
                ->references('id')->on('cakes')
                ->onDelete('cascade');
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
        Schema::table('cakes_interested_list', function (Blueprint $table) {
            //
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfirmBetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('confirm_bets', function (Blueprint $table) {
            $table->id();
            $table->integer('post_id');
            $table->integer('sp_id');
            $table->integer('placer_id');
            $table->string('placer_team');
            $table->integer('taker_id');
            $table->string('taker_team');
            $table->integer('confirm_price');
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
        Schema::dropIfExists('confirm_bets');
    }
}

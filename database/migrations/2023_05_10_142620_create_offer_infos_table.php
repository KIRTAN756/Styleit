<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offer_infos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('U_id')->unsigned();
            $table->bigInteger('Measurment_id')->unsigned();
            $table->bigInteger('Tailor_id')->unsigned();
            $table->bigInteger('Design_id')->unsigned();
            $table->integer('Offer_Price');
            $table->string('Offer_Answer');
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
        Schema::dropIfExists('offer_infos');
    }
};

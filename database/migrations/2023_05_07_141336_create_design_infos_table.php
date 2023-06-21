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
        Schema::create('design_infos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('U_id')->unsigned()->nullable();
            $table->bigInteger('Measurment_id')->unsigned()->nullable();
            $table->bigInteger('Tailor_id')->unsigned()->nullable();
            $table->string('Material_Name');
            $table->string('Material_Color');
            $table->string('Pattern_Name');
            $table->string('Collar_Name');
            $table->string('Sleeve_Name');
            $table->string('Tailor_Org')->nullable();
            $table->integer('Design_Price')->nullable();
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
        Schema::dropIfExists('design_infos');
    }
};

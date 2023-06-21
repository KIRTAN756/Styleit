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
        Schema::create('measurment_infos', function (Blueprint $table) {
            $table->id();
            $table->integer('U_id');
            $table->string('U_Name');
            $table->decimal('M_Chest', 12,2);
            $table->decimal('M_Waist', 12,2);
            $table->decimal('M_Sleeve', 12,2);
            $table->decimal('M_Shoulder', 12,2);
            $table->decimal('M_Neck', 12,2);
            $table->decimal('M_Length', 12,2);
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
        Schema::dropIfExists('measurment_infos');
    }
};

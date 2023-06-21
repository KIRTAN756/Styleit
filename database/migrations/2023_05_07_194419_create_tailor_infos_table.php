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
        Schema::create('tailor_infos', function (Blueprint $table) {
            $table->id();
            $table->string('Tailor_Name');
            $table->string('Tailor_MobileNo');
            $table->string('Tailor_Email');
            $table->string('Tailor_Org');
            $table->string('Tailor_userName');
            $table->string('Tailor_Password');
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
        Schema::dropIfExists('tailor_infos');
    }
};

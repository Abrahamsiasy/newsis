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
        Schema::create('womens', function (Blueprint $table) {
            $table->id();
            $table->date('last_menstrual_cycle')->nullable();
            $table->tinyInteger('number_of_pregnancies')->nullable();
            $table->string('pregnancie_complications')->nullable();
            $table->tinyInteger('number_of_live_births')->nullable();
            $table->date('manopause_date')->nullable();
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
        Schema::dropIfExists('womens');
    }
};

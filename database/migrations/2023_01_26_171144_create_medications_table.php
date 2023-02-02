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
        Schema::create('medications', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('amount')->nullable();//50 mg tabs
            $table->string('frequency')->nullable();//how often dayyily or weakly 
            $table->string('why')->nullable();
            $table->string('how_much')->nullable();//how much pills, number of bottel or pills 
            
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
        Schema::dropIfExists('medications');
    }
};

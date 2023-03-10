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
        Schema::table('lab_results', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('status')->default(1);
        });

        Schema::table('medications', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('status')->default(1);
        });

        Schema::table('personal_records', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('status')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lab_results', function (Blueprint $table) {
            //
            $table->dropColumn('status');
        });

        Schema::table('medications', function (Blueprint $table) {
            //
            $table->dropColumn('status');
        });

        Schema::table('personal_records', function (Blueprint $table) {
            //
            $table->dropColumn('status');
        });
    }
};

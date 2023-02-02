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
        Schema::table('lab_queues', function (Blueprint $table) {
            //
            $table->dropForeign(['lab_request_id']);
            $table->dropColumn('lab_request_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lab_queues', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('lab_request_id')->nullable();
            $table->foreign('lab_request_id')->references('id')->on('lab_requests')->onDelete('cascade');
        });
    }
};

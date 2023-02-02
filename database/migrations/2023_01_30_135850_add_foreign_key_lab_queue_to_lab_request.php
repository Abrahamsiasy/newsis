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
        Schema::table('lab_requests', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('lab_queue_id')->nullable();
            $table->foreign('lab_queue_id')->references('id')->on('lab_queues')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lab_requests', function (Blueprint $table) {
            //
            $table->dropForeign('lab_queue_id');
        });
    }
};

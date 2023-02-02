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
        //Add student and doctor id to queues table
        Schema::table('queues', function (Blueprint $table) {
            //
            //student queues
            $table->unsignedBigInteger('student_id')->nullable();
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            //select a room based on doctor which is a room user
            $table->unsignedBigInteger('doctor_id')->nullable();
            $table->foreign('doctor_id')->references('id')->on('users')->onDelete('cascade');
        });
        //Add student and doctor id to queues table
        Schema::table('lab_queues', function (Blueprint $table) {
            //
            //student queues
            $table->unsignedBigInteger('student_id')->nullable();
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            //student queues get the student id from lab request
            $table->unsignedBigInteger('lab_request_id');
            $table->foreign('lab_request_id')->references('id')->on('lab_requests')->onDelete('cascade');

            //select a room based on doctor which is a room user
            $table->unsignedBigInteger('lab_assistant_id')->nullable();
            $table->foreign('lab_assistant_id')->references('id')->on('users')->onDelete('cascade');
        });
        //lab request foreign keys
        Schema::table('lab_requests', function (Blueprint $table) {
            //
            //student id for lab que and medical record
            $table->unsignedBigInteger('student_id')->nullable();
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');

            //student queues get the student id from lab request
            $table->unsignedBigInteger('doctor_id')->nullable();
            $table->foreign('doctor_id')->references('id')->on('users')->onDelete('cascade');
        });

        //lab result foreign keys
        Schema::table('lab_results', function (Blueprint $table) {

            //student queues get the student id from lab request
            $table->unsignedBigInteger('lab_request_id');
            $table->foreign('lab_request_id')->references('id')->on('lab_requests')->onDelete('cascade');

            //select a room based on doctor which is a room user
            $table->unsignedBigInteger('lab_assistant_id')->nullable();
            $table->foreign('lab_assistant_id')->references('id')->on('users')->onDelete('cascade');

            //student queues
            $table->unsignedBigInteger('student_id')->nullable();
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
        });

        //medical_records foreign keys
        Schema::table('medical_records', function (Blueprint $table) {

            //Not needed /to be leted on production
            $table->unsignedBigInteger('lab_request_id')->nullable();
            $table->foreign('lab_request_id')->references('id')->on('lab_requests')->onDelete('cascade');

            //select a room based on doctor which is a room user
            $table->unsignedBigInteger('doctor_id')->nullable();
            $table->foreign('doctor_id')->references('id')->on('users')->onDelete('cascade');
            //student queues
            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
        });
        //connect medication to medical record
        Schema::table('medications', function (Blueprint $table) {
            //
            //madication and dose list
            $table->unsignedBigInteger('medical_record_id')->nullable();
            $table->foreign('medical_record_id')->references('id')->on('medical_records')->onDelete('cascade');
        });
        //connect personal history to medical record
        Schema::table('personal_records', function (Blueprint $table) {
            //madication and dose list
            $table->unsignedBigInteger('medical_record_id')->nullable();
            $table->foreign('medical_record_id')->references('id')->on('medical_records')->onDelete('cascade');
        });
        //Add campus id to  table clinics
        Schema::table('rooms', function (Blueprint $table) {
            //
            //foreign id for clinic room belongs to clinc
            $table->unsignedBigInteger('clinic_id');
            $table->foreign('clinic_id')->references('id')->on('clinics')->onDelete('cascade');
            $table->unsignedBigInteger('user_id')->default(1);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
        //Add campus id to  table clinics
        Schema::table('clinics', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('campus_id')->nullable();
            $table->foreign('campus_id')->references('id')->on('campuses')->onDelete('cascade');
        });

        //Add user 
        Schema::table('users', function (Blueprint $table) {
            //
            //foreign id for clinic room belongs to clinc
            $table->unsignedBigInteger('clinic_id')->nullable();
            $table->foreign('clinic_id')->references('id')->on('clinics')->onDelete('cascade');
            //foreign id for clinic room belongs to clinc
            $table->unsignedBigInteger('campus_id')->nullable();
            $table->foreign('campus_id')->references('id')->on('campuses')->onDelete('cascade');
            // $table->unsignedBigInteger('room_user')->default(1);
            // $table->foreign('room_user')->references('id')->on('users')->onDelete('cascade');   

        });


        //Add user 
        Schema::table('students', function (Blueprint $table) {
            //
            //foreign id for clinic room belongs to clinc
            $table->unsignedBigInteger('clinic_id')->nullable();
            $table->foreign('clinic_id')->references('id')->on('clinics')->onDelete('cascade');
            //foreign id for clinic room belongs to clinc
            $table->unsignedBigInteger('campus_id')->nullable();
            $table->foreign('campus_id')->references('id')->on('campuses')->onDelete('cascade');
            // $table->unsignedBigInteger('room_user')->default(1);
            // $table->foreign('room_user')->references('id')->on('users')->onDelete('cascade');   

        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // drop foreign keys of each schema
        Schema::table('queues', function (Blueprint $table) {
            $table->dropForeign('student_id');
            $table->dropForeign('doctor_id');
        });

        Schema::table('lab_queues', function (Blueprint $table) {
            $table->dropForeign('student_id');
            $table->dropForeign('lab_request_id');
            $table->dropColumn('lab_request_id');
        });
        Schema::table('lab_requests', function (Blueprint $table) {
            $table->dropForeign('student_id');
            $table->dropForeign('doctor_id');
        });
        Schema::table('lab_results', function (Blueprint $table) {
            $table->dropForeign('lab_request_id');
            $table->dropForeign('lab_assistant_id');
            $table->dropForeign('student_id');

        });
        Schema::table('medical_records', function (Blueprint $table) {
            $table->dropForeign('lab_request_id');
            $table->dropForeign('doctor_id');
            $table->dropForeign('student_id');
        });
        Schema::table('medications', function (Blueprint $table) {
            $table->dropForeign('medical_record_id');
        });
        Schema::table('personal_records', function (Blueprint $table) {
            $table->dropForeign('medical_record_id');
        });
        Schema::table('rooms', function (Blueprint $table) {
            $table->dropForeign('user_id');
            $table->dropForeign('clinic_id');
        });
        Schema::table('clinics', function (Blueprint $table) {
            $table->dropForeign('campus_id');

        });
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('clinic_id');
            $table->dropForeign('campus_id');
        });
        Schema::table('students', function (Blueprint $table) {
            $table->dropForeign('clinic_id');
            $table->dropForeign('campus_id');
        });
        

        
    }
};

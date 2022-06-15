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
        Schema::create('student_courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sid')->constrained('students','id'); //OR,  $table->foreignId('sid')->constrained('students');
            $table->foreignId('cid')->constrained('courses'); //by default course table ko primary key lincha

            // OR, $table->unsignedBigInteger('cid');
            // $table->foreignId('sid')->references('id')->on('courses');

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
        Schema::dropIfExists('student_courses');
    }
};

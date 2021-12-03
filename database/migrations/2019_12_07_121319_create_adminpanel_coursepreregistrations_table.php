<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminpanelCoursepreregistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adminpanel_coursepreregistrations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('section');
            $table->integer('course_id');
            $table->integer('semester_id');
            $table->integer('student_id');
            $table->float('paymentStatus');
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
        Schema::dropIfExists('adminpanel_coursepreregistrations');
    }
}

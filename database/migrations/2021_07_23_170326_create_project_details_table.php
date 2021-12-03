<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('s_id');
            $table->string('s_name');
            $table->string('batch');
            $table->string('email');
            $table->string('phone');
            $table->string('project');
            $table->string('cgpa');
            $table->string('study');
            $table->string('title');
            $table->string('sv_name');
            $table->string('sv_init');
            $table->string('Internal_Reviewer_1');
            $table->string('Internal_Reviewer_name');
            $table->string('credit');
            $table->string('course');
            $table->string('edit');
            $table->string('mid_video');
            $table->string('final_video');
            $table->string('f_url');
            $table->string('user_id');
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
        Schema::dropIfExists('project_details');
    }
}

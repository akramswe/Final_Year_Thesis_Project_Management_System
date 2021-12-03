<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupervisorMarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supervisor__marks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('std_id');
            $table->string('std_name');
            $table->string('email');
            $table->string('spr_mark');
            $table->string('spr_name');
            $table->string('spr_initial');
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
        Schema::dropIfExists('supervisor__marks');
    }
}

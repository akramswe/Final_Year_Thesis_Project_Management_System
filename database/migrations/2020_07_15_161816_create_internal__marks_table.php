<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInternalMarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('internal__marks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('std_id');
            $table->string('std_name');
            $table->string('email');
            $table->string('intrnl_mark');
            $table->string('intrnl_name');
            $table->string('intrnl_initial');
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
        Schema::dropIfExists('internal__marks');
    }
}

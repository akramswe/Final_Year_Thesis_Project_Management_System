<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideourlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videourls', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('s_name');
            $table->string('s_id');
            $table->string('email');
            $table->string('title');
            $table->string('sv');
            $table->string('url');
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
        Schema::dropIfExists('videourls');
    }
}

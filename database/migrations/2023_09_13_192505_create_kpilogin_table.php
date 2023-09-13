<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKpiloginTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kpilogin_students', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_student');
            $table->foreign('id_student')->references('id')->on('students');
          
            $table->dateTime('last_access');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kpilogin_students');
    }
}

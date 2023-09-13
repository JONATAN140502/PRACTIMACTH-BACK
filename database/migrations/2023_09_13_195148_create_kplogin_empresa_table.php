<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKploginEmpresaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kplogin_companies', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_company');
            $table->foreign('id_company')->references('id')->on('companies');
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
        Schema::dropIfExists('kplogin_empresa');
    }
}

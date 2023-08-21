<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('knowledges_students', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_student');
            $table->foreign('id_student')->references('id')->on('students');
            $table->unsignedInteger('id_knowledges');
            $table->foreign('id_knowledges')->references('id')->on('knowledges');
            $table->integer('state');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('knowledges_students');
    }
};

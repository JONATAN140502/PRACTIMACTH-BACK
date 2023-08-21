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

        Schema::create('matchs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_practice');
            $table->foreign('id_practice')->references('id')->on('practices');
            $table->integer('id_student');
            $table->foreign('id_student')->references('id')->on('students');
            $table->date('date');
            $table->integer('state');
            $table->string('ratings');
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
        Schema::dropIfExists('macths');
    }
};

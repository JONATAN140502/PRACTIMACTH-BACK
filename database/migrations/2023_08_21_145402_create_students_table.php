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

        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('last_name');
            $table->string('code')->unique();
            $table->string('dni')->unique();
            $table->string('correo')->unique();
            $table->string('phone');
            $table->integer('id_school');
            $table->foreign('id_school')->references('id')->on('schools');
            $table->string('skills');
            $table->integer('state');
            $table->string('cicle');
            $table->string('user_name');
            $table->string('password');
            $table->dateTime('last_access');
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
        Schema::dropIfExists('students');
    }
};

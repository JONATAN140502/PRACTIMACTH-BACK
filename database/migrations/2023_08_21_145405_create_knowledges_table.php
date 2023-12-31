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

        Schema::create('knowledges', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('state');
            $table->string('descipcion');
            $table->unsignedInteger('id_idsubspecialty')->nullable();
            $table->foreign('id_idsubspecialty')->references('id')->on('sub_specialties');
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
        Schema::dropIfExists('knowledges');
    }
};

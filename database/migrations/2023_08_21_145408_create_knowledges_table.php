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
            $table->id();
            $table->string('name');
            $table->integer('state');
            $table->string('descipcion');
            $table->integer('id_idsubspecialtie')->nullable();
            $table->foreign('id_idsubspecialtie')->references('id')->on('sub_specialties');
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

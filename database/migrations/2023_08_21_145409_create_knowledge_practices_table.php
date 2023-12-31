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

        Schema::create('knowledge_practices', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_practice');
            $table->foreign('id_practice')->references('id')->on('practices');
            $table->unsignedInteger('id_knowledges');
            $table->foreign('id_knowledges')->references('id')->on('knowledges');
            $table->integer('state')->nullable();
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
        Schema::dropIfExists('knowledge_practices');
    }
};

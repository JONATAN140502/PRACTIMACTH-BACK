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

        Schema::create('specialties', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('descripcion');
            $table->integer('id_school');
            $table->integer('state');
            $table->bigInteger('id_area');
            $table->foreign('id_area')->references('id')->on('areas');
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
        Schema::dropIfExists('specialties');
    }
};

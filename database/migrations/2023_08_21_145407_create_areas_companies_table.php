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

        Schema::create('areas_companies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_company');
            $table->foreign('id_company')->references('id')->on('companies');
            $table->integer('id_area');
            $table->foreign('id_area')->references('id')->on('areas');
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
        Schema::dropIfExists('areas_companies');
    }
};

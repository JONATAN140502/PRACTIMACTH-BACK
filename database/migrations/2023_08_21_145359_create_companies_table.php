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

        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('ruc')->unique();
            $table->string('correo');
            $table->string('business_name');
            $table->string('address');
            $table->string('district');
            $table->string('province');
            $table->string('department');
            $table->string('phone');
            $table->string('descripcion');
            $table->integer('valoration');
            $table->string('user_name');
            $table->string('password');
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
        Schema::dropIfExists('companies');
    }
};

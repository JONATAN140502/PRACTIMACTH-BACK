<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameDescipcionInKnowledges extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('knowledges', function (Blueprint $table) {
            $table->renameColumn('descipcion', 'description');
            $table->renameColumn('id_idsubspecialty', 'id_subspecialty');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('knowledges', function (Blueprint $table) {
            $table->renameColumn('description', 'descipcion');
            $table->renameColumn('id_subspecialty', 'id_idsubspecialty');
        });
    }
}

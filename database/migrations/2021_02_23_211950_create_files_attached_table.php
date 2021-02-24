<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesAttachedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files_attached', function (Blueprint $table) {
            $table->id();
            $table->string('idfile');
            $table->string('filename');
            $table->string('filepath');
            $table->string('fileExtension');
            $table->string('email_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('files_attached');
    }
}

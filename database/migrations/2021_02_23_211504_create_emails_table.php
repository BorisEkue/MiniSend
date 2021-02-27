<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emails', function (Blueprint $table) {
            $table->string('id');
            $table->string('idmail');
            $table->string('from');
            $table->string('to');
            $table->string('cc');
            $table->string('subject');
            $table->string('content');
            $table->string('content_type');
            $table->string('has_files');
            $table->timestamps();
        });

        DB::table('emails')->insert(
            array(
                'id' => 'm_100873acb07f0b31',
                'idmail' => 'm_100873acb07f0b31',
                'from' => 'alice@gmail.com',
                'to' => 'admin@gmail.com',
                'cc' => '',
                'subject' => 'Hello from Alice',
                'content' => 'Hello from Alice',
                'content_type' => 'html',
                'has_files' => 0,
                'created_at' => time(),
                'updated_at' => time(),
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('emails');
    }
}

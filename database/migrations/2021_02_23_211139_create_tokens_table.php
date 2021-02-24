<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTokensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tokens', function (Blueprint $table) {
            $table->string('id')->unique();
            $table->string('access_token')->unique();
            $table->dateTime('expires_at');
            $table->string('token_type');
            $table->string('id_user');
            $table->timestamps();
        });

        // DB::table('tokens')->insert(
        //     array(
        //         'id' => 't_001',
        //         'access_token' => 'Boris',
        //         'expires_at' => 'EKUE-HETTAH',
        //         'email' => 'kueviboris@gmail.com',
        //         'password' => 'admin'
        //     )
        // );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tokens');
    }
}

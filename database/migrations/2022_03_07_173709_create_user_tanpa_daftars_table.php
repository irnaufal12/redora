<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTanpaDaftarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_tanpa_daftars', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('nama')->length(50);
            $table->string('email')->length(50);
            $table->timestamp('email_verified_at')->nullable();
            $table->date('tgl_lahir')->length(8);
            $table->string('alamat')->length(255);
            $table->string('gol_darah')->length(8);
            $table->string('no_telp')->length(15);
            $table->rememberToken();
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
        Schema::dropIfExists('user_tanpa_daftars');
    }
}

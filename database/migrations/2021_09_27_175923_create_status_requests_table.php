<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatusRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status_requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');

            $table->date('tgl_pembuatan');
            $table->string('gol_darah')->length(8);
            $table->string('kontak')->length(15);
            $table->string('status')->length(30);
            $table->json('pendonor')->nullable();
            $table->json('pendonor_tanpa_daftar')->nullable();
            $table->text('keterangan')->nullable();


            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('status_requests');
    }
}

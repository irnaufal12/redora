<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKonfirmasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('konfirmasis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('status_request_id');

            $table->date('tgl_pembuatan');
            $table->date('tgl_konfirmasi')->nullable();
            $table->string('konfirmasi')->length(8)->nullable();

            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('status_request_id')->references('id')->on('status_requests');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('konfirmasi');
    }
}

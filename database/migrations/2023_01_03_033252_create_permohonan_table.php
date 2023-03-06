<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permohonan', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('kategori_permohonan', 100);
            $table->string('nik_nip', 50);
            $table->string('nama_lengkap');
            $table->string('ktp');
            $table->string('akta')->nullable();
            $table->string('email', 100);
            $table->string('telepon', 20);
            $table->string('pekerjaan', 100);
            $table->text('alamat');
            $table->text('rincian_informasi');
            $table->text('tujuan');
            $table->string('get_information', 100);
            $table->string('copy_information', 100);
            $table->string('how_copy', 100);
            $table->integer('kode_permohonan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permohonan');
    }
};

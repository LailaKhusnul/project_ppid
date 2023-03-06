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
        Schema::create('ppid_pelaksana', function (Blueprint $table) {
            $table->id();
            $table->String('nama_opd', 150);
            $table->text('alamat');
            $table->String('telepon', 50);
            $table->string('user_id', 5)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ppid_pelaksana');
    }
};

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
        if (!Schema::hasTable('posts')) {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->integer('kategori_id');
            $table->text('contents')->nullable();
            $table->string('thumbnail');
            $table->date('tgl_post');
            $table->string('slug');
            $table->string('ispublish');
            $table->string('ispinned');
            $table->integer('users_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArtikelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artikels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('judul');
            $table->string('slug');
            $table->text('isi');
            $table->string('judul_seo')->nullable();
            $table->text('deskripsi')->nullable();
            $table->text('keyword')->nullable();
            $table->string('status');
            $table->string('kategori')->nullable();
            $table->string('gambar')->nullable();
            $table->string('author')->default(1);
            $table->integer('hits')->default(0);
            $table->integer('show_comment')->nullable();
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
        Schema::dropIfExists('artikels');
    }
}

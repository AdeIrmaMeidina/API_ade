<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('films', function (Blueprint $table) {
            $table->id();
            $table->string('judul')->unique();
            $table->string('slug');
            $table->unsignedBigInteger('id_kategori');
            $table->text('deskripsi');
            $table->string('foto');
            $table->string('url_video');
            $table->timestamps();

            $table->foreign('id_kategori')->references('id')->on('kategoris')->onDelete('cascade');


        });

        Schema::create('genre_film', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_genre');
            $table->unsignedBigInteger('id_film');

            $table->foreign('id_genre')->references('id')->on('genres')->onDelete('cascade');
            $table->foreign('id_film')->references('id')->on('films')->onDelete('cascade');

            $table->timestamps();


        });

        Schema::create('actor_films', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_actor');
            $table->unsignedBigInteger('id_film');

            $table->foreign('id_actor')->references('id')->on('actors')->onDelete('cascade');
            $table->foreign('id_film')->references('id')->on('films')->onDelete('cascade');

            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('films');
        Schema::dropIfExists('actor_films');
        Schema::dropIfExists('genre_films');
    }
};

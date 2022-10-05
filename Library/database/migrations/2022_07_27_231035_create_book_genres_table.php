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
        Schema::create('book_genres', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("book_id")->nullable();
            $table->foreign("book_id")
            ->references("id")
            ->on("books")
            ->onUpdate("Cascade")
            ->onDelete("Restrict");


            $table->unsignedBigInteger("genre_id")->nullable();
            $table->foreign("genre_id")
            ->references("id")
            ->on("genres")
            ->onUpdate("Cascade")
            ->onDelete("Restrict");

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
        Schema::dropIfExists('book_genres');
    }
};

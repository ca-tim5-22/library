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
        Schema::create('knjiga_zanrs', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("book_id");
            $table->foreign("book_id")
            ->references("id")
            ->on("knjigas")
            ->onUpdate("Cascade")
            ->onDelete("Restrict");


            $table->unsignedBigInteger("genre_id");
            $table->foreign("genre_id")
            ->references("id")
            ->on("zanrs")
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
        Schema::dropIfExists('knjiga_zanrs');
    }
};

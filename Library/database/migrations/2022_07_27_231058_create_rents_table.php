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
        Schema::create('rents', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("book_id");
            $table->foreign("book_id")
            ->references("id")
            ->on("books")
            ->onUpdate("Cascade")
            ->onDelete("Restrict");
          

            $table->unsignedBigInteger("user_who_rented_out_id");//User who rented out a book
            $table->foreign("user_who_rented_out_id")
            ->references("id")
            ->on("users")
            ->onUpdate("Cascade")
            ->onDelete("Restrict");

            $table->unsignedBigInteger("user_who_rented_id");//User who borrowed a book
            $table->foreign("user_who_rented_id")
            ->references("id")
            ->on("users")
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
        Schema::dropIfExists('rents');
    }
};

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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("book_id")->nullable();
            $table->foreign("book_id")
            ->references("id")
            ->on("books")
            ->onUpdate("Cascade")
            ->onDelete("Restrict");


            $table->unsignedBigInteger("foruser_id")->nullable();
            $table->foreign("foruser_id")
            ->references("id")
            ->on("users")
            ->onUpdate("Cascade")
            ->onDelete("Restrict");

            $table->unsignedBigInteger("user_that_reserved_id")->nullable();
            $table->foreign("user_that_reserved_id")
            ->references("id")
            ->on("users")
            ->onUpdate("Cascade")
            ->onDelete("Cascade");

            $table->date("date_of_submission")->nullable();
            $table->date("date_of_reservation")->nullable();
            $table->date("date_of_closing")->nullable();
            $table->unsignedBigInteger("reason_of_closing_id")->nullable();
            $table->foreign("reason_of_closing_id")
            ->references("id")
            ->on("reason_for_closing_reservations")
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
        Schema::dropIfExists('reservations');
    }
};

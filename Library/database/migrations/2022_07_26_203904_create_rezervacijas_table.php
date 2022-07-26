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
        Schema::create('rezervacijas', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("book_id");
            $table->foreign("book_id")
            ->references("id")
            ->on("knjigas")
            ->onUpdate("Cascade")
            ->onDelete("Restrict");


            $table->unsignedBigInteger("foruser_id");
            $table->foreign("foruser_id")
            ->references("id")
            ->on("korisnik")
            ->onUpdate("Cascade")
            ->onDelete("Restrict");

            $table->unsignedBigInteger("user_that_reserved_id");
            $table->foreign("user_that_reserved_id")
            ->references("id")
            ->on("korisnik")
            ->onUpdate("Cascade")
            ->onDelete("Cascade");

            $table->date("date_of_submission");
            $table->date("date_of_reservation");
            $table->date("date_of_closing");
            $table->unsignedBigInteger("reason_of_closing_id");
            $table->foreign("reason_of_closing_id")
            ->references("id")
            ->on("razlog_zatvaranja_rezervacije")
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
        Schema::dropIfExists('rezervacijas');
    }
};

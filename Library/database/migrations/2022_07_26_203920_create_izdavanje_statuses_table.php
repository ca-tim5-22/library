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
        Schema::create('rent_statuses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("renting_id");
            $table->foreign("renting_id")
            ->references("id")
            ->on("rents")
            ->onUpdate("Cascade")
            ->onDelete("Cascade");

            $table->unsignedBigInteger("book_status_id");
            $table->foreign("book_status_id")
            ->references("id")
            ->on("book_statuses")
            ->onUpdate("Cascade")
            ->onDelete("Cascade");

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
        Schema::dropIfExists('rent_statuses');
    }
};

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
        Schema::create('izdavanje_statuses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("renting_id");
            $table->foreign("renting_id")
            ->references("id")
            ->on("izdavanjes")
            ->onUpdate("Cascade")
            ->onDelete("Cascade");

            $table->unsignedBigInteger("book_status_id");
            $table->foreign("book_status_id")
            ->references("id")
            ->on("status_knjige")
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
        Schema::dropIfExists('izdavanje_statuses');
    }
};

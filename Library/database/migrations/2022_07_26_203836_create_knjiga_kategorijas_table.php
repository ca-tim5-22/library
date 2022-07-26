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
        Schema::create('knjiga_kategorijas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("book_id");
            $table->foreign("book_id")
            ->references("id")
            ->on("knjigas")
            ->onUpdate("Cascade")
            ->onDelete("Restrict");

            $table->unsignedBigInteger("category_id");
            $table->foreign("category_id")
            ->references("id")
            ->on("kategorija")
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
        Schema::dropIfExists('knjiga_kategorijas');
    }
};
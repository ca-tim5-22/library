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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string("title",256);
            $table->integer("number_of_pages");

            $table->unsignedBigInteger("alphabet_id");
            $table->foreign("alphabet_id")
            ->references("id")
            ->on("alphabets")
            ->onUpdate("Cascade")
            ->onDelete("Restrict");

            $table->unsignedBigInteger("language_id");
            $table->foreign("language_id")
            ->references("id")
            ->on("languages")
            ->onUpdate("Cascade")
            ->onDelete("Restrict");

            $table->unsignedBigInteger("binding_id");
            $table->foreign("binding_id")
            ->references("id")
            ->on("bindings")
            ->onUpdate("Cascade")
            ->onDelete("Restrict");

            $table->unsignedBigInteger("publisher_id");
            $table->foreign("publisher_id")
            ->references("id")
            ->on("publishers")
            ->onUpdate("Cascade")
            ->onDelete("Restrict");

            $table->date("rent_date");
            $table->string("ISBN",20);
            $table->integer("total");
            $table->integer("rented");
            $table->integer("reserved");
            $table->string("content",4128);
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
        Schema::dropIfExists('book');
    }
};

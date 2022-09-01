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

            $table->unsignedBigInteger("alphabet_id")->nullable();
            $table->foreign("alphabet_id")
            ->references("id")
            ->on("alphabets")
            ->onUpdate("Cascade")
            ->onDelete("Restrict");

            $table->unsignedBigInteger("language_id")->nullable();
            $table->foreign("language_id")
            ->references("id")
            ->on("languages")
            ->onUpdate("Cascade")
            ->onDelete("Restrict");

            $table->unsignedBigInteger("binding_id")->nullable();
            $table->foreign("binding_id")
            ->references("id")
            ->on("bindings")
            ->onUpdate("Cascade")
            ->onDelete("Restrict");

            $table->unsignedBigInteger("format_id")->nullable();
            $table->foreign("format_id")
            ->references("id")
            ->on("formats")
            ->onUpdate("Cascade")
            ->onDelete("Restrict");

            $table->unsignedBigInteger("publisher_id")->nullable();
            $table->foreign("publisher_id")
            ->references("id")
            ->on("publishers")
            ->onUpdate("Cascade")
            ->onDelete("Restrict");

            $table->integer("release_date")->nullable();
            $table->string("ISBN",20)->nullable();
            $table->integer("total")->nullable();
            $table->integer("rented")->nullable()->default(0);
            $table->integer("reserved")->nullable()->default(0);
            $table->string("content",4128)->nullable();
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
        Schema::dropIfExists('books');
    }
};

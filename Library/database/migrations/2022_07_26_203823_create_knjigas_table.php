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
        Schema::create('knjigas', function (Blueprint $table) {
            $table->id();
            $table->string("title",256);
            $table->integer("number_of_pages");

            $table->unsignedBigInteger("alphabet_id");
            $table->foreign("alphabet_id")
            ->references("id")
            ->on("pismos")
            ->onUpdate("Cascade")
            ->onDelete("Restrict");

            $table->unsignedBigInteger("lang_id");
            $table->foreign("lang_id")
            ->references("id")
            ->on("jeziks")
            ->onUpdate("Cascade")
            ->onDelete("Restrict");

            $table->unsignedBigInteger("binding_id");
            $table->foreign("binding_id")
            ->references("id")
            ->on("povezs")
            ->onUpdate("Cascade")
            ->onDelete("Restrict");

            $table->unsignedBigInteger("izdavac_id");
            $table->foreign("izdavac_id")
            ->references("id")
            ->on("izdavac")
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
        Schema::dropIfExists('knjigas');
    }
};

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
        Schema::create('rezervacija_statuses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("reservation_id");
            $table->foreign("reservation_id")
            ->references("id")
            ->on("rezervacijas")
            ->onUpdate("Cascade")
            ->onDelete("Cascade");

            $table->unsignedBigInteger("reservation_status_id");
            $table->foreign("reservation_status_id")
            ->references("id")
            ->on("status_rezervacijes")
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
        Schema::dropIfExists('rezervacija_statuses');
    }
};

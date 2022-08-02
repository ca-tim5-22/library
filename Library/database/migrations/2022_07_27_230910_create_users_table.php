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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_type_id");
            $table->foreign("user_type_id")
            ->references("id")
            ->on("type_of_users")
            ->onUpdate("Cascade")
            ->onDelete("Cascade");
            $table->string("first_name",128);
            $table->string("last_name",128);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string("username",64);
            $table->string("PIN",50);
            $table->string("photo",256);
            $table->string('password',256);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};

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
            $table->string('name',128);
            $table->string('email',128)->unique();
            $table->string('phone_number',32)->unique();
            $table->string('password',128)->unique();
            $table->bigInteger('reward_points')->default(0);
            $table->tinyInteger('email_verified_at')->default(0);
            $table->tinyInteger('email_verified_token')->nullable();
            $table->string('facebook_id',32)->nullable();
            $table->string('google_id',32)->nullable();
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

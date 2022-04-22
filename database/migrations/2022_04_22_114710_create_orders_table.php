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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
        
            $table->string('customer_name',28);
            $table->string('customer_address',28);
            $table->text('customer_phone');
            $table->string('city',32);
            $table->string('postal_code',16);
            $table->decimal('total_amount',10,2);
            $table->decimal('discount_amount',10,2)->default(0);
            $table->decimal('paid_amount',10,2);
            $table->string('payment_status',16)->default('pending');
            $table->text('payment_details',10,2)->nullable();
            $table->string('operational_status',16)->default('pending');

            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('processed_by')->references('id')->on('users')->onDelete('cascade')->nullable();

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
        Schema::dropIfExists('orders');
    }
};

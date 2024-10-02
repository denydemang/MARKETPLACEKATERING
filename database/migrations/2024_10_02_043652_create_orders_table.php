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
            $table->bigIncrements("id");
            $table->unsignedBigInteger("customer_id");
            $table->unsignedBigInteger("merchant_id");
            $table->date("order_date");
            $table->decimal("total_price",65,4)->default(0);
            $table->string("status",100);
            $table->foreign('merchant_id')->references('id')->on('merchants')->onDelete('cascade')->onUpdate("cascade");
            $table->foreign('customer_id')->references('id')->on('users')->onDelete('cascade')->onUpdate("cascade");
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

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
        Schema::create('order_details', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->unsignedBigInteger("order_id");
            $table->unsignedBigInteger("menu_id");
            $table->bigInteger("quantity");
            $table->decimal("price",65,4)->default(0);
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade')->onUpdate("cascade");
            $table->foreign('menu_id')->references('id')->on('menus')->onDelete('cascade')->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_details');
    }
};

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
        Schema::create('invoices', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->unsignedBigInteger("order_id");
            $table->string("invoice_number", 100)->unique();
            $table->decimal("total_price", 65,4)->default(0);
            $table->decimal("paid_amount", 65,4)->default(0);
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade')->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
};

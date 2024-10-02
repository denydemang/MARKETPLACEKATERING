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
        Schema::create('menus', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->unsignedBigInteger("merchant_id");
            $table->string("name", 100);
            $table->string("description", 200);
            $table->decimal("price",65,4)->default(0);
            $table->string("photo",100);
            $table->foreign('merchant_id')->references('id')->on('merchants')->onDelete('cascade')->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menuses');
    }
};

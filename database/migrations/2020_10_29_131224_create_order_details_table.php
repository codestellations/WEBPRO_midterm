<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->char('fk_id_order', 6);
            $table->char('fk_id_book', 6);

            $table->foreign('fk_id_order')->references('id_order')->on('order')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('fk_id_book')->references('id_book')->on('book')->onUpdate('cascade')->onDelete('cascade');
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
}

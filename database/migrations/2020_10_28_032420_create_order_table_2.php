<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTable2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // foreign key
        Schema::table('order', function (Blueprint $table) {
            $table->char('fk_id_payment', 6)->nullable();
            $table->char('fk_id_customer', 6);

            $table->foreign('fk_id_payment')->references('id_payment')->on('payment')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('fk_id_customer')->references('id_customer')->on('customer')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order');
    }
}

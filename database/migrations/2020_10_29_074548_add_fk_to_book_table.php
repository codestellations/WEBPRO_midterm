<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkToBookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // foreign key
        Schema::table('book', function (Blueprint $table) {
            $table->char('fk_id_category', 6);
            $table->char('fk_id_promo', 6)->nullable();

            $table->foreign('fk_id_category')->references('id_category')->on('category')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('fk_id_promo')->references('id_promo')->on('promo')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book');
    }
}

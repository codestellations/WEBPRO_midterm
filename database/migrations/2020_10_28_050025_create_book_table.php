<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book', function (Blueprint $table) {
            $table->char('id_book', 6);
            $table->primary('id_book');
            $table->string('name_book', 50);
            $table->string('author', 30);
            $table->integer('price_book');
            $table->integer('pages');
            $table->date('date_published');
            $table->string('publisher', 30);
            $table->integer('stock');
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

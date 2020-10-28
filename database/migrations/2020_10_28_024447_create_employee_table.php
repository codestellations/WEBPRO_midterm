<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee', function (Blueprint $table) {
            $table->char('id_employee', 6);
            $table->primary('id_employee');
            $table->string('name_employee', 50);
            $table->string('email_employee', 30)->unique();
            $table->string('pass_employee', 50);
            $table->boolean('gender');
            $table->string('phone_num_employee', 16);
            $table->string('role', 30);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee');
    }
}

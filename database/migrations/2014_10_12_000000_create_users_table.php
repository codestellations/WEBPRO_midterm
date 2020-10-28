<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('users')){
            Schema::create('users', function (Blueprint $table) {
                $table->id();
                $table->string('name', 50);
                $table->string('email', 50)->unique();
                $table->timestamp('email_verified_at')->nullable();
                $table->string('password');

                // $table->char('id_employee', 6);
                // $table->primary('id_employee');

                // $table->string('name_employee', 50);
                // $table->string('email_employee', 30)->unique();
                // $table->string('password_employee');

                $table->string('gender', 10);
                $table->string('phone_num', 13);
                $table->string('role', 30);
                $table->rememberToken();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}

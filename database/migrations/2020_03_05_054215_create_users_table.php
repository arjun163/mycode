<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
           $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->timestamp('usertype')->nullable();

            
            $table->string('email');
            $table->string('password');
           
           
            $table->string('mobile');
            $table->string('user_name');
            $table->date('birthdate')->format('d.m.Y');
            $table->string('gender');
            $table->string('bio');
            $table->string('image');
            $table->string('country');
            $table->string('state');
            $table->string('pincode');
            $table->string('status');
             $table->integer('role_id')->unsigned();
                    $table->foreign('role_id')->references('id')->on('parents');
            $table->timestamps();
        });
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

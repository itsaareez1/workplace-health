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
            $table->string('salutation', 4)->nullable();
            $table->string('name', 100);
            $table->string('email')->unique();
            $table->string('company', 100);
            $table->string('workpermit',30);
            $table->string('password', 128);
            $table->string('img',50)->nullable();
            $table->boolean('terms');
            $table->string('phone', 13);
            $table->boolean('phonestatus')->nullable();
            $table->boolean('emailstatus')->nullable();
//            $table->rememberToken();
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

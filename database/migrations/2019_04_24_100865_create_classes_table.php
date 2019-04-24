<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('img', 100);
            $table->string('time', 8);
            $table->string('duration', 10);
            $table->string('venue', 50);
            $table->string('slots', 10);
            $table->string('description', 1500);
            $table->integer('credits');
            $table->string('level', 10);
            $table->string('status', 50);
            $table->integer('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->integer('admin_id');
            $table->foreign('admin_id')->references('id')->on('admins');
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
        Schema::dropIfExists('classes');
    }
}

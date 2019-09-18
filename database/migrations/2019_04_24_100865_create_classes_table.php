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
            $table->string('time', 20);
            $table->string('duration', 10);
            $table->string('venue', 50);
            $table->string('description', 1500);
            $table->integer('credits');
            $table->string('level', 20);
            $table->string('slot', 15);
            $table->string('status', 50);
            $table->integer('state');
            $table->integer('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->integer('program_id');
            $table->foreign('program_id')->references('id')->on('programs');
            $table->integer('is_delete')->default(0);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
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

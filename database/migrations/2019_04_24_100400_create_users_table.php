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
            $table->integer('company_id');
            $table->foreign('company_id')->references('id')->on('companies');
            $table->string('workpermit',30);
            $table->string('password', 128);
            $table->string('img',50)->nullable();
            $table->string('phone', 13);
            $table->boolean('phonestatus')->nullable();
            $table->boolean('emailstatus')->nullable();
            $table->string('nam', 100)->nullable();
            $table->string('IC',50)->nullable();
            $table->string('signature',100)->nullable();
            $table->date('dat')->nullable();
            $table->string('q1',1)->nullable();
            $table->string('q2',1)->nullable();
            $table->string('q3',1)->nullable();
            $table->string('q4',1)->nullable();
            $table->string('q5',1)->nullable();
            $table->string('q6',1)->nullable();
            $table->string('q7',1)->nullable();
            $table->string('q8',1)->nullable();
            $table->string('q9',1)->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

//            $table->rememberToken();
//            $table->timestamps();
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

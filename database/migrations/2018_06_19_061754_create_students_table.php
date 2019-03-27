<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('student_id');
            $table->string('first_name',20);
            $table->string('second_name',20);
            $table->string('last_name',20)->nullable();
            $table->date('dob');
            $table->string('status');
            $table->string('nationality',50)->nullable();
            $table->string('passport',50)->nullable();
            $table->string('phone',50)->nullable();
            $table->string('village',50)->nullable();
            $table->string('commune',50)->nullable();
            $table->string('district',50)->nullable();
            $table->string('province',50)->nullable();
            $table->string('current_address',100)->nullable();
            $table->string('date_registered');
            $table->string('photo',200)->nullable();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

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
        Schema::dropIfExists('students');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('studname');
            $table->string('studemail')->unique();
            $table->string('course');
            $table->string('fee');
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('students');
    }
}

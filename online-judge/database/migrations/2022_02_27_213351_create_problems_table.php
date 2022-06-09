<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProblemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('problems', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('solved')->unsigned()->nullable();
            $table->String('pdf_file')->nullable();
            $table->integer('testcase')->nullable();
            $table->String('output')->nullable();
            $table->integer('contest')->nullable();
            $table->String('visibility')->nullable();
            $table->String('time_limit')->nullable();
            $table->String('memory_limit')->nullable();
            $table->String('p_in_s');
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
        Schema::dropIfExists('problems');
    }
}

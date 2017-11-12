<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionmodelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questionmodels', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('partmodel_id')->unsigned();
            $table->foreign('partmodel_id')->references('id')->on('partmodels')->onDelete('cascade');
            $table->integer('scanmodel_id')->unsigned();
            $table->foreign('scanmodel_id')->references('id')->on('scanmodels')->onDelete('cascade');
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
        Schema::dropIfExists('questionmodels');
    }
}

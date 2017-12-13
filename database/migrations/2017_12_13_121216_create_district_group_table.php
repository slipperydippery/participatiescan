<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDistrictGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('district_group', function (Blueprint $table) {
            $table->integer('district_id')->unsigned();
            $table->integer('group_id')->unsigned();

            $table->foreign('group_id')->references('id')->on('groups');
            $table->foreign('district_id')->references('id')->on('districts');

            $table->primary(array('group_id', 'district_id'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('district_group');
    }
}

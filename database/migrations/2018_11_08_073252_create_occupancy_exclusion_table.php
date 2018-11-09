<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOccupancyExclusionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('occupancy_exclusion', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type')->comment('类型');
            $table->string('criteria_name')->comment('标准名称');
            $table->string('cycle_number')->comment('周期号');
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
        Schema::dropIfExists('occupancy_exclusion');
    }
}

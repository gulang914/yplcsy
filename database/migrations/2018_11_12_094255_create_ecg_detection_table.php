<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEcgDetectionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ecg_detection', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_id')->comment('项目id');
            $table->integer('cycle')->comment('周期号');
            $table->integer('serial_number')->comment('序号');
            $table->string('dose_num');
            $table->string('timing')->comment('时间点');
            $table->string('relative_day')->comment('相对天数');
            $table->string('relative_time')->comment('相对时间');
            $table->string('time_operator')->comment('时间窗运算符');
            $table->string('time_value')->comment('时间窗值');
            $table->string('time_unit')->comment('时间窗单位');
            $table->string('desc')->comment('检测点描述');
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
        Schema::dropIfExists('ecg_detection');
    }
}

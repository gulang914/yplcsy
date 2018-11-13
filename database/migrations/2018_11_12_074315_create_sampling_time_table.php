<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSamplingTimeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sampling_time', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_id')->comment('项目id');
            $table->integer('cycle')->comment('周期号');
            $table->integer('serial')->comment('序号');
            $table->integer('dose_num')->comment('基于给药序号');
            $table->string('timing')->comment('时间点');
            $table->string('relative_day')->comment('相对天数');
            $table->time('relative_time')->comment('相对时间');
            $table->string('time_operator')->comment('时间运算符');
            $table->string('time_value')->comment('时间窗值');
            $table->string('time_unit')->comment('时间窗单位');
            $table->text('desc')->comment('样品采集点描述');
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
        Schema::dropIfExists('sampling_time');
    }
}

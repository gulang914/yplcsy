<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBloodSugarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blood_sugar', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_id')->comment('项目id');
            $table->integer('cycle')->comment('周期号');
            $table->integer('serial_number')->comment('序号');
            $table->integer('dose_number')->comment('基于给药序号');
            $table->string('timing')->comment('时间点');
            $table->integer('relative_day')->comment('相对天数');
            $table->time('relative_time')->comment('相对时间');
            $table->string('time_operator')->comment('时间窗运算符');
            $table->integer('time_value')->comment('时间窗值');
            $table->integer('time_unit')->comment('时间窗单位');
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
        Schema::dropIfExists('blood_sugar');
    }
}

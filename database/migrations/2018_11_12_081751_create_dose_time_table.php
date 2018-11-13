<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoseTimeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dose_time', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_id')->comment('项目名称');
            $table->integer('cycle')->comment('周期号');
            $table->integer('dose_num')->comment('给药顺序号');
            $table->integer('relative_day')->comment('相对天数');
            $table->time('relative_time')->comment('相对时间');
            $table->string('time_operator')->comment('时间窗运算符');
            $table->string('time_value')->comment('时间窗值');
            $table->string('time_unit')->comment('世界窗单位');
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
        Schema::dropIfExists('dose_time');
    }
}

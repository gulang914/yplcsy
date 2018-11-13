<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubjectRecruitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subject_recruit', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_id')->comment('项目id');
            $table->integer('mation_id')->comment('试验id');
            $table->string('name')->comment('姓名');
            $table->string('number')->comment('身份证号');
            $table->date('birthday')->comment('出生日期');
            $table->integer('age')->comment('年龄');
            $table->string('system_number')->comment('系统编号');
            $table->integer('height')->comment('身高(cm)');
            $table->string('weight')->comment('体重(kg)');
            $table->string('bmi')->comment('BMI');
            $table->date('registration_time')->comment('报名时间');
            $table->string('sources')->comment('信息来源');
            $table->string('remarks')->comment('备注');
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
        Schema::dropIfExists('subject_recruit');
    }
}

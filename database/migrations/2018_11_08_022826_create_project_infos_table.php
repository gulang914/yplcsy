<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sponsor')->comment('申办方信息');
            $table->string('cro')->comment('cro');
            $table->string('project_name')->comment('项目名称');
            $table->string('item_number')->comment('项目编号');
            $table->string('pshort_name')->comment('项目简称');
            $table->string('case_number')->comment('备案号');
            $table->string('center_number')->comment('本中心编号');
            $table->string('scheme_number')->comment('方案编号');
            $table->string('plan_number')->comment('内部方案编号');
            $table->integer('version_number')->comment('方案版本号');
            $table->date('version_date')->comment('方案版本日期');
            $table->integer('consent_number')->comment('知情同意书版本号');
            $table->date('consent_date')->comment('知情同意书版本日期');
            $table->date('medical _date')->comment('原始病历版本日期');
            $table->date('bingli_date')->comment('病历报告版本日期');
            $table->date('start_time')->comment('开始时间');
            $table->date('end_time')->comment('结束日期');
            $table->string('label_title')->comment('样品标签标题');
            $table->string('testing_company')->comment('生物样本检测公司');
            $table->string('statistics_company')->comment('数据管理统计公司');
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
        Schema::dropIfExists('project_infos');
    }
}

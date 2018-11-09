<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInquiryPhysiqueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inquiry_physique', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('type')->comment('类型');
            $table->integer('order')->comment('顺序');
            $table->string('explain')->comment('说明');
            $table->string('configuration_options')->comment('选项配置');
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
        Schema::dropIfExists('inquiry_physique');
    }
}

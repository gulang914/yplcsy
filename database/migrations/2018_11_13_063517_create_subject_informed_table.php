<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubjectInformedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subject_informed', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('recruit_id')->comment('受试者姓名');
            $table->string('initials')->comment('姓名缩写');
            $table->date('mission_time')->comment('宣教时间');
            $table->string('missionary')->comment('宣教人');
            $table->string('status')->comment('是否签署');
            $table->string('researcher')->comment('研究者');
            $table->string('annex')->comment('附件');
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
        Schema::dropIfExists('subject_informed');
    }
}

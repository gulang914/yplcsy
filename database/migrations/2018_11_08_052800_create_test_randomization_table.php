<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestRandomizationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_randomization', function (Blueprint $table) {
            $table->increments('id');
            $table->string('serial_number')->comment('入组顺序号');
            $table->string('random_number')->comment('入组随机号');
            $table->string('group_name')->comment('入组名称');
            $table->integer('project_id')->comment('项目id');
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
        Schema::dropIfExists('test_randomization');
    }
}

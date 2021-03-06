<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_group', function (Blueprint $table) {
            $table->increments('id');
            $table->string('group_name')->comment('分组名称');
            $table->string('group_type')->comment('分组类型');
            $table->string('group_desc')->comment('分组描述');
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
        Schema::dropIfExists('test_group');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_recipes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('recipes_name')->comment('食谱名称');
            $table->string('recipes_type')->comment('食谱类型');
            $table->string('producer')->comment('制定人');
            $table->string('desc')->comment('备注')->nullable();
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
        Schema::dropIfExists('test_recipes');
    }
}

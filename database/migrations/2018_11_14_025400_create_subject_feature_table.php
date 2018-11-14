<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubjectFeatureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subject_feature', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('mation_id')->comment('试验id');
            $table->string('recruit_id')->comment('受试者id');
            $table->string('race')->comment('种族');
            $table->string('career')->comment('职业');
            $table->string('unit')->comment('单位');
            $table->string('birthplace')->comment('籍贯');
            $table->string('marriage')->comment('婚否');
            $table->string('address')->comment('address');
            $table->string('mailbox')->comment('邮箱');
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
        Schema::dropIfExists('subject_feature');
    }
}

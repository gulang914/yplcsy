<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSponsorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sponsor', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company_name')->comment('公司名称');
            $table->string('company_phone')->comment('公司电话');
            $table->string('company_address')->comment('公司地址');
            $table->string('company_fax')->comment('公司传真');
            $table->string('company_email')->comment('公司邮箱');
            $table->string('project_role')->comment('项目角色');
            $table->string('contact')->comment('联系人');
            $table->string('contact_number')->comment('联系人电话');
            $table->string('email')->comment('联系人邮箱');
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
        Schema::dropIfExists('sponsor');
    }
}

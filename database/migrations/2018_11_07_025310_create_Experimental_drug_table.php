<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExperimentalDrugTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Experimental_drug', function (Blueprint $table) {
            $table->increments('id');
            $table->string('drug_name')->comment('药品名称');
            $table->string('drug_type')->comment('药品类型');
            $table->string('specification')->comment('规格');
            $table->string('dosage')->comment('用量');
            $table->string('unit')->comment('单位');
            $table->string('approach')->comment('用药途径');
            $table->string('supplier')->comment('供应商');
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
        Schema::dropIfExists('Experimental_drug');
    }
}

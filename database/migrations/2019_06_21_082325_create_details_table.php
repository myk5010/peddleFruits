<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fruits_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('c_id')->comment('分类ID');
            $table->string('spec', 20)->comment('规格');
            $table->string('brand', 20)->comment('品牌');
            $table->string('unit', 6)->comment('单位');
            $table->decimal('last_offer', 10, 2)->comment('上次报价');
            $table->decimal('current_offer', 10, 2)->comment('本次报价');
            $table->decimal('final_offer', 10, 2)->comment('核定报价');
            $table->string('quality', 100)->comment('质量承诺');
            $table->text('picture_address')->comment('图片地址');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fruits_details');
    }
}

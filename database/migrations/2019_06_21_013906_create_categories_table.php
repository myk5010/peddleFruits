<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fruits_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('pid')->comment('父级id');
            $table->tinyInteger('lv')->comment('分类等级');
            $table->string('name', 10)->comment('分类名');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fruits_categories');
    }
}

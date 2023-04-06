<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblProductFeatures extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_product_features', function (Blueprint $table) {
            $table->increments('product_id');
            $table->string('product_features_1');
            $table->string('product_features_2');
            $table->string('product_features_3');
            $table->string('product_features_4');
            $table->string('product_features_5');
            $table->string('product_features_6');
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
        Schema::dropIfExists('tbl_product_features');
    }
}

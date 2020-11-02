<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFindOrderPurposeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('find_order_find_order_purpose', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('find_order_id')->unsigned();
            $table->foreign('find_order_id')->references('id')->on('find_team_orders');
            $table->bigInteger('find_order_purpose_id')->unsigned();
            $table->foreign('find_order_purpose_id')->references('id')->on('find_order_purposes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('find_team_order_purpose');
    }
}

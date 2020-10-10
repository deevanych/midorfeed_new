<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFindTeamOrderPurposeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('find_team_order_purpose', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('find_team_order_id')->unsigned();
            $table->foreign('find_team_order_id')->references('id')->on('find_team_orders');
            $table->bigInteger('purpose_id')->unsigned();
            $table->foreign('purpose_id')->references('id')->on('purposes');
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

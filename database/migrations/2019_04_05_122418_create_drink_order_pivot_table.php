<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDrinkOrderPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drink_order_pivot', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('drink_id');
            $table->unsignedBigInteger('order_id');

            $table->foreign('drink_id')
                ->references('id')
                ->on('drinks')
                ->onDelete('cascade');

            $table->foreign('order_id')
                ->references('id')
                ->on('orders')
                ->onDelete('cascade');

            $table->enum('status', ['pending', 'in_progress', 'complete'])->default('pending');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('drink_order_pivot');
    }
}

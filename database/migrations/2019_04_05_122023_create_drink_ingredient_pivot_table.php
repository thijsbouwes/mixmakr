<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDrinkIngredientPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drink_ingredient', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('drink_id');
            $table->unsignedBigInteger('ingredient_id');

            $table->foreign('ingredient_id')
                ->references('id')
                ->on('ingredients')
                ->onDelete('cascade');

            $table->foreign('drink_id')
                ->references('id')
                ->on('drinks')
                ->onDelete('cascade');

            $table->integer('amount');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('drink_ingredient_pivot');
    }
}

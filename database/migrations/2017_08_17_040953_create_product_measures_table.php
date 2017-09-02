<?php

use Illuminate\Support\Facades\Schema;

use Illuminate\Database\Schema\Blueprint;

use Illuminate\Database\Migrations\Migration;

class CreateProductMeasuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('product_measures', function (Blueprint $table) {

            $table->integer('id')->unsigned();

            $table->primary('id');

            $table->integer('product_id')->unsigned();

            $table->string('productMeasureValue');

            $table->integer('magnitude_id')->unsigned();

            $table->integer('metric_id')->unsigned();

            $table->foreign('product_id')
                    ->references('id')->on('products')
                    ->onDelete('restrict')
                    ->onUpdate('cascade');

            $table->foreign('magnitude_id')
                    ->references('id')->on('magnitudes')
                    ->onDelete('restrict')
                    ->onUpdate('cascade');

            $table->foreign('metric_id')
                    ->references('id')->on('metrics')
                    ->onDelete('restrict')
                    ->onUpdate('cascade');


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

        Schema::dropIfExists('product_measures');

    }
}

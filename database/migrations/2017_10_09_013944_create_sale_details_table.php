<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaleDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('sale_details', function (Blueprint $table) {

            $table->integer('id')->unsigned();

            $table->primary('id');

            $table->integer('sale_id')->unsigned();

            $table->integer('product_id')->unsigned();

            $table->integer('productSaleQuantity')->unsigned();

            $table->decimal('productSalePrice',10,2);

            $table->unique(['sale_id','product_id'],'unique_detail_index');

            $table->timestamps();


            $table->foreign('sale_id')

                ->references('id')

                ->on('sales')

                ->onDelete('restrict')

                ->onUpdate('cascade');


            $table->foreign('product_id')

                ->references('id')

                ->on('products')

                ->onDelete('restrict')

                ->onUpdate('cascade');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::dropIfExists('sale_details');

    }
}

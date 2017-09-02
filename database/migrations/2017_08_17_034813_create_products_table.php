<?php

use Illuminate\Support\Facades\Schema;

use Illuminate\Database\Schema\Blueprint;

use Illuminate\Database\Migrations\Migration;


class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('products', function (Blueprint $table) {

            $table->integer('id')->unsigned();

            $table->primary('id');

            $table->string('productName');

            $table->unique('productName');

            $table->text('productDescription');

            $table->decimal('productCost',10,2);

            $table->decimal('productPrice',10,2);

            $table->integer('productQuantity');

            $table->integer('category_id')->unsigned();

            $table->integer('brand_id')->unsigned();

            $table->integer('color_id')->unsigned();

            $table->integer('supplier_id')->unsigned();

            $table->foreign('category_id')
                    ->references('id')->on('categories')
                    ->onDelete('restrict')
                    ->onUpdate('cascade');

            $table->foreign('brand_id')
                    ->references('id')->on('brands')
                    ->onDelete('restrict')
                    ->onUpdate('cascade');

            $table->foreign('color_id')
                    ->references('id')->on('colors')
                    ->onDelete('restrict')
                    ->onUpdate('cascade');

            $table->foreign('supplier_id')
                    ->references('id')->on('suppliers')
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

        Schema::dropIfExists('products');

    }
}
